<?php

namespace App\Http\Controllers;

use App;
use App\User;
use Illuminate\Http\Request;
use App\Template;
use App\Options;
use App\Questions;
use Carbon\Carbon;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use App\Notifications\ApprovalNotification;
use App\Notifications\ContactForm;
use App\FileControl\FileControl;
use App\Answer;
use App\UserCredit;
use App\Discounts;
use DB;
use Bitly;
use Session;
use App\QuestionsObject\AppQuestionsObject;
use App\Articulo;
use App\TemplatesStyle;
use Redirect;

class EncuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $mail = "laura@rednodo.com";

    public function index()
    {
        $template = Template::find(1);
        $id = Auth::id();
        $user = DB::table('users')->where('id', '=', $id)->get();
        //dd($user);

        $templates = Template::where('type', 0)->get();
        return view('encuestas.index', compact('template','user','action', 'templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->id);
        $template = Template::find($request->id);
        $templates_style= TemplatesStyle::get();
        $action = 'create';
        $view = 'encuestas.create';
        $questions = \DB::table("questions")->where("template_id", 1)->orderBy("position")->get();

        return $this->form($template, $action, $view, $questions, $templates_style);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2(Request $request)
    {
        //dd($request->id);
        $template = Template::find($request->id);
        $templates_style= TemplatesStyle::get();
        $question = Questions::where('template_id','=',$template->id)->first();
        $action = 'create';
        $view = 'encuestas.create2';
        // $questions = \DB::table("questions")->where("template_id", 1)->orderBy("position")->get();
        // dd($question);

        $templates_style = TemplatesStyle::get();

        // dd($templates_style);

        return $this->form($template, $action, $view, $question, $templates_style);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTemplate(Request $request)
    {
        $input = Input::all();
        $user = User::findOrNew($input['user_id']);
        //dd($user);
        //dd($request->userName);

        if($request->plan == 1)
        {
            //dd('Entré al if');
            // $creditos=DB::table("user_credit")->sum('credits');
            // $discounts=DB::table("discounts")->sum('credits');
            // //dd($discounts);
            $creditosUser = DB::table("user_credit")->where('user_id' ,'=', $user->id)->sum('credits');
            //dd($creditosUser);
            $discountsUser = DB::table("discounts")->where('user_id' ,'=', $user->id)->sum('credits');
            //dd($discountsUser);
            $totalCreditsUser = $creditosUser - $discountsUser;
            //dd($totalCreditsUser);
            $user->totalCredits = $totalCreditsUser;
            //dd($user->totalCredits);
            if($totalCreditsUser <= 0){
              flash('<br><h6>No puedes crear encuestas Premium sin créditos.</h6>')->error();

              $template = Template::find(1);
              $id = Auth::id();
              $user = DB::table('users')->where('id', '=', $id)->get();
              $templates = Template::where('type', 0)->get();
              return view('encuestas.index', compact('template','user','action', 'templates'));
            }
            else{
              $tot = $creditosUser-$discountsUser;
            }
        }
        $template = new Template;
        $id = Auth::id();
        $template->user_id = $id;
        $template->name = $request->name;
        $template->type = $request->tipo;
        $template->plan = $request->plan;
        $template->description = '';
        $template->hash = base64_encode(Hash::make(Carbon::now()));
        $template->templates_style_id = 1;
        $template->save();

        if($request->tipo == 0)
        {   // info@survenia.com   admin
            $user->name = 'Admin';
            $user->email = $this->mail;
            $user->notify(new ApprovalNotification($user, $template));

           // return redirect()->route('encuestas_publicas.index');
        }elseif($request->tipo == 1)
        {
            $user->name = $request->userName;
            $user->email = $request->email;
            $user->notify(new ApprovalNotification($user, $template));
        }

        if($request->plan == 1)
        {
        $discount = new Discounts;
        $discount->credits = 1;
        $discount->template_id = $template->id;
        $discount->user_id = $id;

        $discount->save();
        }

        return redirect('encuestas/create2/'.$template->id);

         //return redirect()->route('encuestas/create2', ['id' => $template->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSurveyContent(Request $request)
    {
        //dd($request);



        $input = Input::all();
        $json_data = json_encode($input);
        $questions = new Questions;
        $template = Template::findOrNew($input['template_id']);
        // dd($template);
        $template->name = $request->template_name;
        $template->title = "";
        $template->description = "";
        $template->hash = base64_encode(Hash::make(Carbon::now()));
        $template->save();
        $questions->template_id = $request->template_id;
        $questions->position = 1;
        $questions->content = $json_data;
        $questions->save();

        // $input['input-name'];
        // $input['multi'];
        // $input['comment'];

        return redirect()->route('mis_encuestas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $template = Template::find(1);
        $options = Options::all();
        $questions = \DB::table("questions")->where("template_id", 1)->orderBy("position")->get();
        $action = 'create';

        return view('encuestas.form', compact('template', 'options', 'questions', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        //dd($request);

        return redirect()->route('mis_encuestas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveQuestion(Request $request){

        $user = Auth::user();
        $template=Template::find($request->template_id);
        if($request->hasFile('saveImage')) {
            $fileName = FileControl::storeFile($request->saveImage, 'imagenesEncuestas');
            foreach($fileName as $file){
                $request->saveImage = "/imagenesEncuestas/{$file}";
                $template->url = $request->saveImage[$i];
                $template->save();
            }
        }

        //dd($fileName);

        $preguntas=json_decode($request->content);

        if($template->plan==0 && count($preguntas)>10)
        {
            return response()->json("exceso",500);
        }

        $question=Questions::where('template_id','=',$request->template_id)->first();
        if(!$question)
        {
            $question=new Questions;
        }

        $question->position=0;
        $question->content=json_decode($request->content);
        $question->template_id=$request->template_id;
        //$question->options_questions_id=
        $question->save();


        if($template->type == 0)
        {   // info@survenia.com   admin
            $user->name = 'Admin';
            $user->email = $this->mail;
            $user->notify(new ApprovalNotification($user, $template));

            // flash('<br><h6>Tu encuesta ha sido enviada para aprobación del administrador del sistema.</h6>')->success();

            // return redirect()->route('mis_encuestas.index');
        }

    }

    public function saveQuestion2(Request $request)
    {

            $user = Auth::user();
            $template = Template::find($request->template);
            $template->templates_style_id = $request->templates_style_id;
            $question = Questions::where('template_id','=',$request->template)->first();
            if(!$question) {
                $question = new Questions;
            }

            $qContent = json_decode($request->questions);
             if($template->plan == 0 && count($qContent) > 10) {
                 return Redirect::back()->withErrors(['msg', 'The Message']);

             }

            if($request->hasFile('surveyLogo')) {
                $fileName = FileControl::storeSingleFile($request->surveyLogo, 'imagenesEncuestas');
                    $template->url = "/imagenesEncuestas/{$fileName}";
            }

            $surveyContent = json_decode($request->questions);
            if($request->images) {
                foreach($request->images  as $uid => $image) {
                    $fileName = FileControl::storeSingleFile($image, 'imagenesSurvey');
                    $url = "/imagenesSurvey/{$fileName}";
                    foreach($surveyContent as $q) {
                        if($q->uid == $uid) {
                            $q->answer = $url;
                        }
                    }
                }
            }
            $question->position = 0;
            $question->content = $surveyContent;
            $question->template_id = $request->template;
            $question->save();
            $template->save();

            if($template->type == 0){
                flash('<br><h6>Encuesta guardada correctamente. Queda sujeto a aprobaci&oacute;n del moderador su publicación en el Blog de Survenia.</h6>')->success();

                $id = Auth::id();
                $templates = Template::where('user_id','=', $id)->latest()->get();
                return view('mis_encuestas.index',compact('templates'));
            }
            else{
                flash('<br><h6>Encuesta guardada correctamente.</h6>')->success();

                $id = Auth::id();
                $templates = Template::where('user_id','=', $id)->latest()->get();
                return view('mis_encuestas.index',compact('templates'));
            }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function answerTemplate($id)
    {
        $template = Template::find($id);
        $question = Questions::where('template_id','=',$id)->first();
        $template_style = TemplatesStyle::find($template->templates_style_id);

        return view('encuestas.answer', compact('template','question','template_style'));
    }

      /**
     * Show the form for the specified resource.
     *
     * @param  \App\User  $user
     * @param  string  $action
     * @param  string  $view
     * @return \Illuminate\Http\Response
     */
    protected function form($template, $action, $view, $question, $templates_style)
    {
        $options = Options::get();
        $params = compact('template', 'action', 'options','question','templates_style');
        return view($view, $params);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOptions($type)
    {
        //$value = $type == 'multi' ? 'Multiple Choice' : 'Star Rating';

        return Options::where('type', $type)->get()->first();
    }

    public function saveAnswer(Request $request)
    {
        $ip = \Request::ip();
        $id_template=$request->template;

        $template=Template::find($id_template);
        $totalAnswer=Answer::where('id_template','=',$id_template)->get();

        if($template->plan==0) //Encuesta pública
        {
            if(count($totalAnswer)>=100)
            {
                return response()->json('maximo',500);
            }
        }

        $answer = Answer::where('ip', '=', $ip)->where('id_template', '=', $id_template)->first();

        // if($answer)
        // {
        //     flash('<br><h6>No puedes responder dos veces la misma encuesta.</h6>')->error();

        //     $templates = Template::Search($request->title)->with('user')->where([['type', '=', '0'],['approval', '=', '1']])->latest()->paginate(5);
        //     $user = User::all();

        //     return view('encuestas_publicas.index',compact('templates','user'));
        // }

        $answer=new Answer;
        $answer->id_template=$id_template;
        $answer->position=0;
        $answer->answer=$request->answer;
        $answer->ip = $ip;
        if( Auth::user() ) {
            $answer->user_id = Auth::user()->id;
        }
        else {
            $answer->user_id = null;
        }
        $answer->save();

        flash('<br><h6>Encuesta respondida correctamente.</h6>')->success();

        $templates = Template::Search($request->title)->with('user')->where([['type', '=', '0'],['approval', '=', '1']])->latest()->paginate(5);
        $user = User::all();
        return view('encuestas_publicas.index',compact('templates','user'));
    }

    public function getRespuestas($id, AppQuestionsObject $questionsObject)
    {
        $template = Template::find($id);
        $printQuestions = $questionsObject->getQuestionsObject($id);
        // dd($printQuestions);
        return view('mis_encuestas.respuestas',compact('template', 'printQuestions'));
    }

    private function cleanQuestion($question)
    {
        if(strstr($question->name, 'star')) {
            $question->name  = str_replace('starRating-', "", $question->name );
            return $question->name;
        }
        if(strstr($question->name, 'slider')) {
            $question->name  = str_replace('slider-', "", $question->name );
            return $question->name;
        }
    }

    public function bitly($id)
    {
        $template=Template::find($id);
        $url=url('/responder').'/'.$template->hash;
        $urlbit = Bitly::getUrl($url); // http://bit.ly/nHcn3
        return response()->json($urlbit,200);
    }

    public function responderEncuesta($token)
    {
        $template=Template::where('hash','=',$token)->first();
        $question=Questions::where('template_id','=',$template->id)->first();
        $template_style = TemplatesStyle::find($template->templates_style_id);
        return view('encuestas.answer', compact('template','question', 'template_style'));
    }

    public function copyTemplate(Request $request)
    {

        $templateContent = Questions::where('template_id', $request->encuesta)->first();

        $template_img = Template::where('id', $request->encuesta)->first();

        $template = new Template;
        $template->description = '';
        $template->user_id = Auth::id();
        $template->name = $request->name;
        $template->answered = 0;
        $template->type = 0; // all public
        $template->plan = 0;
        $template->url = $template_img->url;
        $template->hash =  base64_encode(Hash::make(Carbon::now()));

        $template->save();


        $questions = new Questions;
        $questions->content = $templateContent->content;
        $questions->template_id = $template->id;
        $questions->position = 0;
        $questions->save();

        return redirect("mis_encuestas/{$template->id}/edit");

    }

    public function getBladeExcel($id, AppQuestionsObject $questionsObject)
    {
        $template = Template::find($id);
        $printQuestions = $questionsObject->getQuestionsObject($id);
        $questions = DB::table("questions")->where("template_id", "=", $id)->get();

        \Excel::create('survey', function($excel) use($printQuestions, $template, $questions) {
            $excel->sheet('survey', function($sheet) use($printQuestions, $template, $questions)  {
                $sheet->loadView('mis_encuestas.export', compact('printQuestions', 'template', 'questions'));
            });
        })->download('xls');
    }


    public function approval($id_template, $status)
    {
        $template = Template::find($id_template);
        $template->approval = $status;
        $template->save();

        return redirect('mis_encuestas');
    }

    public function changeSurveyType(User $user, $id_template, $type)
    {
        //dd($user);

        $template = Template::find($id_template);
        $template->type = $type;
        $template->save();

        if($type == 0)
        {
            $user->name = 'Admin';
            $user->email = $this->mail;
            $user->notify(new ApprovalNotification($user, $template));
        }

        return redirect('mis_encuestas');
    }



    private function process($id) //id_template
    {
           $answers = DB::table('answer')
                  ->select('answer.answer', DB::raw("users.name AS username"))
                  ->leftJoin('users', 'answer.user_id', '=', 'users.id')
                  ->where('id_template', $id)->get();

        $questions1 = DB::table('questions')->select('content')->where('template_id', $id)->first();
        $survey = DB::table('template')->select('name')->where('id', $id)->first();
        $questions = json_decode($questions1->content);

        $questions = collect($questions); // transform to collection

         $questions  =  $questions->reject(function($value, $key) {
                 return $value->type == "file" || $value->type == "header";
         });

         $usernames = $answers->map(function($item, $key){
             return $item->username;
         });

        $answersGrouped = collect();

        foreach ($answers as $user) {
            $questionsB = collect();


            foreach (json_decode($user->answer, true) as $answer) {

                $questionB = $questions->first(function ($questionB) use ($answer) {

                       if(strstr($questionB->name, 'star')) {
                         $questionB->name  = str_replace('starRating-', "", $questionB->name );
                      }
                     if(strstr($questionB->name, 'slider')) {
                         $questionB->name  = str_replace('slider-', "", $questionB->name );
                      }
                      if(strstr($answer['name'], 'slider')) {
                            $answer['name'] = str_replace('sliderslider-', "",  $answer['name']);
                         }

                     if(strstr( $answer['name'], 'star')) {
                         $answer['name'] = str_replace('starstarRating-', "",  $answer['name']);
                     }
                    return $questionB->name === $answer['name'];
                });

                $questionsB->push([
                    'question' => $questionB,
                    'answer' => $answer,
                ]);
            }
            $answersGrouped->push([
                'user' => $user,
                'questions' => $questionsB,
            ]);
        }

        return  $answersGrouped;

    }

    public function sendContactForm(User $user, Request $request)
    {
      //dd($request->all());

      $user->name = 'Admin';
      $user->email = $this->mail;
      $user->notify(new ContactForm($user, $request));

      $articulos=Articulo::orderBy('id', 'desc')->take(3)->get();

      return view('home', compact('articulos'));
    }

}
