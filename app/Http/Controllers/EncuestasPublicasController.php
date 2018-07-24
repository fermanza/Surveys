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
        $printQuestions = $questionsObject->getQuestionsObject($id);

        $exclude = array("text", "header", "textarea", "multiple-text", 
                "contact-information", "star-rating", "image", "slider");
        $matrix = array('matrix', 'matrix-scale');
        $answerCount = DB::table('answer')->where("id_template", "=", $id)->get();
        $answerCount = count($answerCount);
        $options = [];

        for($i = 0; $i < count($printQuestions); $i++){
            if( in_array($printQuestions[$i]->type, $exclude) ){
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
        return view('encuestas_publicas.advanced_report', compact('options', 'template', 'answerCount', 'printQuestions'));
    }



    private function listQuestions($id)  // id_template
    {
        /*$answers = DB::table('answer')
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
         foreach($questions as $q) {
              if(isset($q->required)){
                   unset($q->required);
              } 
         }
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
        } */

            return $answersGrouped;

    }




    public function getQuestions($idEncuesta)
    {
        



    }




}
