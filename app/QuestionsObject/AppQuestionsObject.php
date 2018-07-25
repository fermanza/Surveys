<?php
namespace App\QuestionsObject;

use App\Http\Controllers\Controller;
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

class AppQuestionsObject
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getQuestionsObject($id)
    {
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
        }
        return $printQuestions;
    }
}
