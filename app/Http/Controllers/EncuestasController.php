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
use App\Answer;
use App\UserCredit;
use App\Discounts;
use DB;
use Bitly;

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
        // {
        //     $user->name = $request->name;
        //     $user->email = $request->email;
        //     $user->notify(new ApprovalNotification($user, $template));

        //     return redirect()->route('encuestas_publicas.index');
        // }
        
        if($request->plan == 1)
        {
        $discount = new Discounts;
        $discount->credits = 1;
        $discount->template_id = $template->id;
        $discount->user_id = $id;

        $discount->save();
        }

        return redirect()->route('encuestas.create', ['id' => $template->id]);
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

    public function saveQuestion(Request $request)
    {
        //dd($request->all());
        $template=Template::find($request->template_id);
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
        $question=Questions::where('template_id','=',$id)->first();


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
    protected function form($template, $action, $view, $questions)
    { 
        $options = Options::get();
        //$template = Template::orderBy('id')->get();
        $params = compact('template', 'action', 'options','questions');
        //dd($params);



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
        $id_template=$request->id_template;

        $template=Template::find($id_template);
        $totalAnswer=Answer::where('id_template','=',$id_template)->get();

        
        if($template->plan==0)
        {
            if(count($totalAnswer)>=100)
            {
                return response()->json('maximo',500);
            }
        }
        //dd($ip);
        // $answer = Answer::where('ip', '=', $ip)->where('id_template', '=', $id_template)->first();
        // if($answer)
        // {
        //     return response()->json('ip',500);
        // }


            $answer=new Answer;
            $answer->id_template=$id_template;
            $answer->position=0;
            $answer->answer=$request->answer;
            $answer->ip = $ip;
            $answer->save();

        return response()->json('ok',200);
    }

    public function getRespuestas($id)
    {
        $template=Template::find($id);
        
        $preguntasJson=Questions::where('template_id','=',$id)->first();
        $tmp=json_encode($preguntasJson->content);
        $preguntas=json_decode($tmp);
        $respuestas=Answer::where('id_template','=',$id)->get();
        return view('mis_encuestas.respuestas',compact('template','preguntas','respuestas'));
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
        $template = new Template;
        $template->description = '';
        $template->user_id = Auth::id();
        $template->name = $request->name;
        $template->answered = 0;
        $template->type = 0; // all public
        $template->plan = 0;
        $template->hash =  base64_encode(Hash::make(Carbon::now()));
        
        $template->save();


        $questions = new Questions;
        $questions->content = $templateContent->content;
        $questions->template_id = $template->id;
        $questions->position = 0;
        $questions->save();

        return redirect()->route('mis_encuestas.index');

    }

}
