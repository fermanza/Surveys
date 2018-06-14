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



          foreach($questions as $ques) {
               
                if($ques->type == "textarea" || $ques->type == "text" || $ques->type == "starRating" || $ques->type == "slider") {
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



        return view('encuestas_publicas.advanced_report', compact('questions', 'answers', 'survey', 'questions1'));
    }


    public function getQuestions($idEncuesta)
    {
        



    }




}
