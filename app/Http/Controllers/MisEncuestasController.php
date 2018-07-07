<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\Options;
use App\Questions;
use App\Answer;
use DB;
use Auth;

class MisEncuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        //$templates = Template::where('type','=', 0)->get();
        $id = Auth::id();
        $templates = Template::where('user_id', '=', $id)->where('approval', '=', '1')->latest()->get();

        //$templates = DB::table('template')->where('type','=', 1)->get();
        //dd($templates);

        return view('mis_encuestas.index',compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $ip = \Request::getClientIp();
        // dd($ip);
        $template = Template::find($id);
        $question=Questions::where('template_id','=',$id)->first();
        $action = 'edit';
        $view = 'mis_encuestas.edit';

        return $this->form($template, $action, $view,$question);
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
        $input = Input::all();
        $json_data = json_encode($input);
        $template = Template::findOrNew($input['template_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $questionsModel = Questions::where("template_id", $id);
        $questionsModel->delete();

        $templateModel = Template::find($id);
        $templateModel->delete();

        return back();
    }

    /**
     * Show the form for the specified resource.
     *
     * @param  \App\User  $user
     * @param  string  $action
     * @param  string  $view
     * @return \Illuminate\Http\Response
     */
    protected function form($template, $action, $view,$question)
    { 
        $template->load('questions');
        //dd($template->questions[0]->content);
        /*$questions = $template->questions->map(function($item){
            $item->content = json_decode($item->content);
            return $item;
        });*/
        $cont = 0;
        $options = Options::get();
        //dd($value);
        //dd($questions);
        $params = compact('template', 'action', 'cont','options','question');
        //dd($params);

        //echo json_encode($question->content);
        //die();
        return view($view, $params);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOptions($type)
    {   
        return Options::where('type', $type)->get()->first(); 
    }


}
