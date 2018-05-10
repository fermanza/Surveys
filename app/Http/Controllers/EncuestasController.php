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
        $action = 'create';

        return view('encuestas.index', compact('template','action'));
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
        // dd($request);
        $template = new Template;
        $id = Auth::id();
        //dd($id);
        $template->user_id = $id;
        $template->name = $request->name;
        $template->title = '';
        $template->description = '';
        //$myJSON = json_encode($template);
        //dd($myJSON);
        $template->hash = base64_encode(Hash::make(Carbon::now()));
        $template->save();

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

        return redirect()->route('mis_encuestas.index');
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
}
