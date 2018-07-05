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
        //$templates = Template::Search($request->title)->with('user')->where([['type', '=', '0'],['approval', '=', '1']])->latest()->paginate(5);

        $templates = Template::Search($request->title)->with('user')->where('type', '=', '0')->latest()->paginate(5);
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
        $answers = DB::table('answer')->select('answer')->where('id_template', $idEncuesta)->get();
        $questions1 = DB::table('questions')->select('content')->where('template_id', $idEncuesta)->first();
        $survey = DB::table('template')->select('name')->where('id', $idEncuesta)->first();

        $questions = json_decode($questions1->content);
        $questions = collect($questions);

        $answersGrouped = $this->listQuestions($idEncuesta);

       
   

         $questions  =  $questions->reject(function($value, $key) {
                 return $value->type == "textarea" || $value->type == "text" || $value->type == "starRating" || $value->type == "slider" || $value->type == "header" || $value->type == "file" || $value->type == "date";   
         }); 

          foreach($questions as $ques) {
                if($ques->type == "textarea" || $ques->type == "text" || $ques->type == "starRating" || $ques->type == "slider" || $ques->type == "header") {
                        continue;
                    }
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

        return view('encuestas_publicas.advanced_report', compact('questions', 'answers', 'survey', 'questions1', 'skipped', 'responded', 'answersGrouped'));
    }



    private function listQuestions($id)  // id_template
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
        }

            return $answersGrouped;

    }




    public function getQuestions($idEncuesta)
    {
        



    }




}
