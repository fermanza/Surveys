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
use App\FileControl\FileControl;
use App\Answer;
use App\UserCredit;
use App\Discounts;
use DB;
use Bitly;
use Session;

class EncuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $template = Template::find(1);
        $users = DB::table('users')->where('role', '=', '10')->get();
        $action = 'create';
        //dd($user);

        $templates = Template::where('type', 0)->get();
        return view('encuestas.index', compact('template','users','action', 'templates'));
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
        $action = 'create';
        $view = 'encuestas.create';
        $questions = \DB::table("questions")->where("template_id", 1)->orderBy("position")->get();

        return $this->form($template, $action, $view, $questions);
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
        $question = Questions::where('template_id','=',$template->id)->first();
        $action = 'create';
        $view = 'encuestas.create2';
        // $questions = \DB::table("questions")->where("template_id", 1)->orderBy("position")->get();
        // dd($question);
        return $this->form($template, $action, $view, $question);
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
        //dd($request->all());

        if($request->plan == 1)
        {
            $creditos=DB::table("user_credit")->sum('credits');
            $discounts=DB::table("discounts")->sum('credits');
            $tot = $creditos-$discounts;

            //dd($tot);
            if($tot <= 0)
                return redirect('encuestas?error=1');
        }
        $template = new Template;
        $id = Auth::id();
        $template->user_id = $id;
        $template->name = $request->name;
        $template->type = $request->tipo;
        $template->plan = $request->plan;
        $template->description = '';
        $template->hash = base64_encode(Hash::make(Carbon::now()));
        $template->save();

        // if($request->tipo == 0)
        // {   // info@survenia.com   admin
        //     $user->name = 'Admin';
        //     $user->email = 'isanchez94@hotmail.com';
        //     $user->notify(new ApprovalNotification($user, $template));

        //    // return redirect()->route('encuestas_publicas.index');
        // }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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

        if($template->plan==0 && count($preguntas)>33)
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
            $user->email = 'isanchez94@hotmail.com';
            $user->notify(new ApprovalNotification($user, $template));

            // flash('<br><h6>Tu encuesta ha sido enviada para aprobación del administrador del sistema.</h6>')->success();

            // return redirect()->route('mis_encuestas.index');
        }

    }

    public function saveQuestion2(Request $request)
    {
            $user = Auth::user();
            $template = Template::find($request->template);
            $question = Questions::where('template_id','=',$request->template)->first();
            if(!$question) {
                $question = new Questions;
            }
            $question->position = 0;
            $question->content = json_decode($request->questions);
            $question->template_id = $request->template;
            $question->save();

            flash('<br><h6>Encuesta guardada correctamente. Se ha enviado para su aprobación.</h6>')->success();

            $id = Auth::id();
            $templates = Template::where('user_id', '=', $id)->where('approval', '=', '1')->orWhereNull('approval')->latest()->get();
            return view('mis_encuestas.index',compact('templates'));
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

        return view('encuestas.answer', compact('template','question'));
    }

      /**
     * Show the form for the specified resource.
     *
     * @param  \App\User  $user
     * @param  string  $action
     * @param  string  $view
     * @return \Illuminate\Http\Response
     */
    protected function form($template, $action, $view, $question)
    {
        $options = Options::get();
        $params = compact('template', 'action', 'options','question');
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

        // if($template->plan==0)
        // {
        //     if(count($totalAnswer)>=100)
        //     {
        //         return response()->json('maximo',500);
        //     }
        // }
        //dd($ip);

        //  $answer = Answer::where('ip', '=', $ip)->where('id_template', '=', $id_template)->first();
        //  if($answer)
        // {
        //    return response()->json('ip',500);
        //  }
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

    public function getRespuestas($id)
    {
        $template = Template::find($id);
        $printQuestions = [];
        $multiple = array('contact-information', 'multiple-text');
        $matrix = array('matrix');
        $matrix_scale = array('matrix-scale');
        // Else -> single-text-box

        $answers = DB::table('answer')->where('id_template','=',$id)->get();
        // dd($answers);
        for($k = 0; $k < count($answers); $k++){
            $count=0;
            foreach(json_decode($answers[$k]->answer) as $ans){
                $question = new \stdClass();
                $question->type = $ans->type;

                if( in_array($ans->type, $multiple) ){
                    foreach($ans->config->list as $answerList){
                        $question->uid[] = $answerList->uid;
                        $question->title[] = $answerList->title;
                        $question->answer[] = $answerList->answer;
                    }
                }
                else if(in_array($ans->type, $matrix)){
                    $question->title[] = $ans->config->title;
                    $question->multiple = $ans->config->multiple;
                    // If Multiple is False is Radio otherwise is Checkbox
                    $ii = 0;
                    foreach($ans->answer as $ansList){
                        $text = "";
                        $local_count = 0;
                        if($question->multiple){
                            foreach($ans->config->rows as $answerList){
                                if($ii == $local_count){
                                    $text = $answerList->text;
                                }
                                $local_count++;
                            }
                            foreach($ans->config->cols as $answerList){
                                $text .= " ".$answerList->text;
                            }
                        }
                        else{
                            foreach($ans->config->rows as $answerList){
                                if($ii == $local_count){
                                    $text = $answerList->text;
                                }
                                $local_count++;
                            }
                            foreach($ans->config->cols as $answerList){
                                if($ansList == $answerList->uid){
                                    $question->uid[] = $ansList;
                                    $text .= " ".$answerList->text;
                                }
                            }
                        }
                        $question->answer[] = $text;
                        $ii++;
                    }
                }
                else if(in_array($ans->type, $matrix_scale)){
                    $question->title[] = $ans->config->title;
                    $text = "";
                    unset($answerList);
                    foreach($ans->answer as $keyRow => $ansList){
                        foreach($ansList as $keyCol => $ansListFinal){
                            foreach($ans->config->rows as $answerList){
                                if($keyRow == $answerList->uid) {
                                    $text = $answerList->text;
                                }
                            }
                            foreach($ans->config->cols as $answerList){
                                if($keyCol == $answerList->uid) {
                                    $text .= " ".$answerList->text;
                                }
                            }
                            $text .= " Option: ".$ansListFinal;
                            $question->answer[] = $text;
                            $local_count++;
                            $ii++;
                        }
                    }
                }
                else{
                    $question->uid[] = $ans->uid;
                    $question->title[] = $ans->title;
                    $question->answer[] = $ans->answer;
                }
                $question->answer_id = $answers[$k]->id;
                if($answers[$k]->user_id == null){
                    $question->user_name = 'Anónimo';
                }
                else{
                    $user = User::find($answers[$k]->user_id);
                    $question->user_name = $user->name;
                }
                // print_r($question);
                array_push($printQuestions, $question);
            }
        }
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
        return view('encuestas.answer', compact('template','question'));
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

    public function getBladeExcel($id){

          $answersGrouped = $this->process($id);
          $template = Template::find($id);


        \Excel::create('survey', function($excel) use($answersGrouped, $template) {
            $excel->sheet('survey', function($sheet) use($answersGrouped, $template)  {
                $sheet->loadView('mis_encuestas.export', compact('answersGrouped', 'template'));
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

}
