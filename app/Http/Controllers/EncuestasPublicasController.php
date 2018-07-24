<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\User;
use Auth;
use DB;

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



    public function showAdvancedReport($idEncuesta)
    {

       /* $template = Template::find($idEncuesta);
        $printQuestions = [];
        $multiple = array('contact-information', 'multiple-text');
        $matrix = array('matrix');
        $matrix_scale = array('matrix-scale');
        $answers = DB::table('answer')->where('id_template','=',$idEncuesta)->get();*/
        $answers = DB::table('answer')->select('answer')->where('id_template', $idEncuesta)->get();
        $questions1 = DB::table('questions')->select('content')->where('template_id', $idEncuesta)->first();
        $survey = DB::table('template')->select('name')->where('id', $idEncuesta)->first();
        $questions = json_decode($questions1->content);
        $questions = collect($questions);
        $answersGrouped = $this->listQuestions($idEncuesta); 

        /*for($k = 0; $k < count($answers); $k++) {
            $count=0;
            foreach(json_decode($answers[$k]->answer) as $ans) {
                $question = new \stdClass();
                $question->type = $ans->type;

                if( in_array($ans->type, $multiple) ) {
                    foreach($ans->config->list as $answerList) {
                        $question->uid[] = $answerList->uid;
                        $question->title[] = $answerList->title;
                        $question->answer[] = $answerList->answer;
                    }
                }
                else if(in_array($ans->type, $matrix)) {
                    $question->title[] = $ans->config->title;
                    $question->multiple = $ans->config->multiple;
                    // If Multiple is False is Radio otherwise is Checkbox
                    $ii = 0;
                    foreach($ans->answer as $ansList) {
                        $text = "";
                        $local_count = 0;
                        if($question->multiple) {
                            foreach($ans->config->rows as $answerList) {
                                if($ii == $local_count) {
                                    $text = $answerList->text;
                                }
                                $local_count++;
                            }
                            foreach($ans->config->cols as $answerList) {
                                $text .= " ".$answerList->text;
                            }
                        }
                        else{
                            foreach($ans->config->rows as $answerList) {
                                if($ii == $local_count) {
                                    $text = $answerList->text;
                                }
                                $local_count++;
                            }
                            foreach($ans->config->cols as $answerList) {
                                if($ansList == $answerList->uid) {
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
                    $question->title[] = $ans->config->title;
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
        }*/


        //dd($printQuestions);



          foreach($questions as $ques) {
                
                 foreach($ques->values as $v) {
                     $match = 0; 
                       foreach($answers as $answer) { 
                            $ans = json_decode($answer->answer);
                              foreach($ans as $a) {
                                    $a->name = str_replace("[]", '', $a->name);
                                     if($a->name == $ques->name && $a->value == $v->value ) {
                                         $match++;
                                     }
                              }
                       }
                   $v->match = $match;            
                 } 
              }
          $responded = 0;
          $skipped = 0;
            foreach($answers as $answer) {
                   $ans = json_decode($answer->answer);
                   foreach($ans as $values) {
                       if($values->value == "") {
                            $skipped++;
                       } else {
                           $responded++;
                       }
                   }
            }

            dd($answersGrouped);


        return view('encuestas_publicas.advanced_report', compact('questions', 'answers', 'survey', 'questions1', 'skipped', 'responded', 'answersGrouped'));
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
