<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\User;
use Auth;
use DB;
use App\QuestionsObject\AppQuestionsObject;

class EncuestasPublicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $templates = Template::Search($request->title)->with('user')->where([['type', '=', '0'],['approval', '=', '1']])->latest()->paginate(5);

        //$templates = Template::Search($request->title)->with('user')->where('type', '=', '0')->latest()->paginate(5);
        $user = User::all();
        //dd($templates->count());

        return view('encuestas_publicas.index',compact('templates','user'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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



    public function showAdvancedReport($id, AppQuestionsObject $questionsObject)
    {
        $template = Template::find($id);
        $questions = DB::table("questions")->where("template_id", "=", $id)->get();

        $printQuestions = $questionsObject->getQuestionsObject($id);
        $exclude = array("text", "header", "textarea", "multiple-text", 
                "contact-information", "star-rating", "image", "slider");
        $matrix = array('matrix', 'matrix-scale');
        $answerCount = DB::table('answer')->where("id_template", "=", $id)->get();
        $answerCount = count($answerCount);
        $options = [];
        $textQuestions = [];

        if($answerCount<=0){
             return redirect('/mis_encuestas');
        }
        for($i = 0; $i < count($printQuestions); $i++){
            if( in_array($printQuestions[$i]->type, $exclude) ){
                $textQuestions[] = $printQuestions[$i];
                continue;
            }

            if ( in_array($printQuestions[$i]->type, $matrix) ){
                for($j = 0; $j < count($printQuestions[$i]->answer); $j++){
                    $question_name = $printQuestions[$i]->title[0];
                    $option_name = $printQuestions[$i]->answer[$j];

                    if (!isset($options[$question_name][$option_name]) ){
                        $options[$question_name][$option_name] = 1;
                    }
                    else{
                        $options[$question_name][$option_name] ++;
                    }
              }
            }
            else{
                for($j = 0; $j < count($printQuestions[$i]->title); $j++){
                    $question_name = $printQuestions[$i]->title[$j];
                    $option_name = $printQuestions[$i]->answer[$j];

                    if (!isset($options[$question_name][$option_name]) ){
                        $options[$question_name][$option_name] = 1;
                    }
                    else{
                        $options[$question_name][$option_name] ++;
                    }
                }
            }
        }
        // dd($options);
        // dd($printQuestions);
        return view('encuestas_publicas.advanced_report', compact('options', 'template', 'answerCount', 'printQuestions', 'textQuestions', 'questions'));
    }
}
