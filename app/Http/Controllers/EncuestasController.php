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
        if($request->hasFile('saveImage')) {
            $fileName = FileControl::storeFile($request->saveImage, 'imagenesEncuestas');
            $request->saveImage = "/imagenesEncuestas/{$fileName}"; 
            $template->url = $request->saveImage;
            $template->save();
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
           if(Auth::user()) {
                $answer->user_id = Auth::user()->id; 
           } else {
               $answer->user_id = null; 
           }
            
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


        $answers = DB::table('answer')
                  ->select('answer.answer', DB::raw("CONCAT(users.name,' ',users.last_name) AS username"))
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

        

      /*  $usernames->each(function($user, $key) use($questions, $answersGrouped) {
              $user = collect();
        });*/

/*
         $questions->each(function($questionItem, $key) use($answersGrouped, $questions) {
        
             if(strstr($questionItem->name, 'star')) {
                 $questionItem->name  = str_replace('starRating-', "", $questionItem->name );    
              }

             if(strstr($questionItem->name, 'slider')) {
                 $questionItem->name  = str_replace('slider-', "", $questionItem->name );         
              }  
               

           /*   foreach($answersGrouped as $answerArray) {
                 foreach($answerArray as $answer) {   


                            $ans = json_decode($answer->answer);
                            $ans = collect($ans); // transform the array of json to a collection



                         $ans->each(function($ansElement, $key) use($questionItem, $answer) {
                                  
                            if(strstr($ansElement->name, 'slider')) {
                                 $ansElement->name = str_replace('sliderslider-', "", $ansElement->name);
                             }

                             if(strstr($ansElement->name, 'star')) {
                                 $ansElement->name = str_replace('starstarRating-', "", $ansElement->name);
                             }          


                              if($questionItem->type == "contactInformation") {
                                   if($ansElement->name == "name" || $ansElement->name == "message" || $ansElement->name == "email"){
                                        $questionItem->respuestas->push($ansElement->value);
                                       // $questionItem->username->push($answer->username);    
                                   }
                              }else if($ansElement->name == $questionItem->name) {
                                     $questionItem->respuestas->push($ansElement->value);  
                                     //$questionItem->username->push($answer->username);

                              } 

                         });
                  }       
              }*/

     /*    });*/


        // dd($questions);

        
        return view('mis_encuestas.respuestas',compact('template','answers','questions', 'answersGrouped'));
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

}
