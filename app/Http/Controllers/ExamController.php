<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;

class ExamController extends Controller
{

	// Contstruct Method
    private $rcdate ;
    private $date_time ;
    private $logged_id ;

    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->rcdate 		= date('Y-m-d');
        $this->logged_id    = Session::get('admin_id');
        $this->current_time = date('H:i:s');
        $this->date_time    = date('Y-m-d H:i:s') ;
    }

    // before start exam
    public function chooseSession()
    {
        $result = DB::table('tbl_step')->get();
        return view('exam.chooseSession')->with('result',$result);
    }

    // choose session info before exam 
    public function chooseSessionInfo($step_id)
    {
        $data = array();
        $data['step_id'] = $step_id;
        DB::table('admin')->where('id',$this->logged_id)->update($data);
        return Redirect::to('startExam');
    }

    // Going to exam page
    public function startExam()
    {

        $stepQuery = DB::table('admin')->where('id',$this->logged_id)->first();
        $step_id = $stepQuery->step_id;

        $paragraph_id_Query = DB::table('tbl_step')->where('id',$step_id)->first();
        $paragraph_id_is = $paragraph_id_Query->paragraph_id; 

        $paragraphQuery = DB::table('tbl_paragraph')->where('id',$paragraph_id_is)->first();


        $result = $paragraphQuery->paragraph;
        $time = $paragraphQuery->how_times;
        $paragraph_id = $paragraphQuery->id;
        $session_id = substr(microtime(),2,6).rand(7586,1234);
        Session::put('session_id',$session_id);

        $scanPaymentStatus = DB::table('tbl_payment')->where('user_id',$this->logged_id)->where('session_id',$step_id)->first();
        $scanPayment = DB::table('tbl_payment')->where('user_id',$this->logged_id)->where('session_id',$step_id)->count();

        // echo $scanPayment;
        // exit();

        $exam_count = DB::table('tbl_exam_result')->where('step_id',$step_id)->where('user_id',$this->logged_id)->count();
        if($exam_count > 0){
            Session::put('failed','Sorry : You Participate This Exam Already. Please Choose a New Session !!');
            return Redirect::to('chooseSession');
            exit();
        }

        if($scanPayment == '0'){
            // return view('exam.noExam')->with('paragraph_id',$paragraph_id)->with('session_id',$session_id);
            return Redirect::to('makeExamFeePayment/'.$this->logged_id);
        }else if($scanPaymentStatus->status == '0'){
            return view('exam.pendingExam')->with('scanPaymentStatus',$scanPaymentStatus);
        }else{
            $exam_end_date = $stepQuery->exam_end_date;
            $today_date = date('Y-m-d H:i:s');

            if($today_date > $exam_end_date){
                Session::put('failed','Sorry : Your Exam Time is Over. Please Choose a New Session !!');
                return Redirect::to('chooseSession');
                exit();
            }
            return view('exam.startExam')->with('result',$result)->with('paragraphQuery',$paragraphQuery)->with('time',$time)->with('paragraph_id',$paragraph_id)->with('session_id',$session_id)->with('step_id',$step_id);
        }

        // $count = DB::table('tbl_paragraph')->where('status',1)->count();

        // if ($count == 0) {
        //     $result = "Exam is off now";
        //     return view('exam.startExam')->with('result',$result);
        // }else{
        //     $query  = DB::table('tbl_paragraph')->where('status',1)->first();
        //     $result = $query->paragraph;
        //     $time = $query->how_times;
        //     $paragraph_id = $query->id;
        //     $session_id = substr(microtime(),2,6).rand(7586,1234);
        //     Session::put('session_id',$session_id);
        //     return view('exam.startExam')->with('result',$result)->with('query',$query)->with('time',$time)->with('paragraph_id',$paragraph_id)->with('session_id',$session_id);
        // }
    }

    // Wrong word entry
    public function wrongWordEntry(Request $request)
    {
        //Collecting data from html form
        $typedWord      = trim($request->typedWord);
        $databaseWord   = trim($request->databaseWord);
        $paragraph_id   = trim($request->paragraph_id);
        $session_id     = trim($request->session_id);
        
        $data = array();
        $data['user_id']        = Session::get('admin_id');
        $data['session_id']     = $session_id;
        $data['paragraph_id']   = $paragraph_id;
        $data['typedWord']      = $typedWord;
        $data['databaseWord']   = $databaseWord;
        $data['created_at']     = $this->rcdate;
        $data['created_time']   = $this->date_time;

        if($databaseWord != NULL || $databaseWord != ""){
          $query = DB::table('tbl_wrong_typed_word')->insert($data);  
        } 
    }

    // Wrong word View
    public function wrongWordView(Request $request)
    {
        //Collecting data from html form
        $session_id = trim($request->session_id);
        $user_id = Session::get('admin_id');

        $query = DB::table('tbl_wrong_typed_word')->where('session_id',$session_id)->where('user_id',$user_id)->get();

        return view('view_report.wrongWordView')->with('query',$query); 
    }

    // Wrong word View
    public function liveScore(Request $request)
    {
        //Collecting data from html form
        $session_id = trim($request->session_id);
        $paragraph_id = trim($request->paragraph_id);
        $textareaString = str_word_count(trim($request->textareaString));
        $user_id = Session::get('admin_id');


        $paraQuery = DB::table('tbl_paragraph')->where('id',$paragraph_id)->first();
        $databaseWord = $paraQuery->word;

        $errorWord = DB::table('tbl_wrong_typed_word')->where('session_id',$session_id)->where('user_id',$user_id)->count();

        $successWord = $textareaString - $errorWord;

        if($textareaString > $databaseWord){
            $extraTypedWord = $textareaString - $databaseWord;
            $totalErrorWord = $errorWord+$extraTypedWord;

            $successWordGreater = $textareaString - $totalErrorWord;

            $percentage = ($successWordGreater*100)/$databaseWord;

            if($percentage < 0){
                $percentage = 0;
            }else{
                $percentage = $percentage;
            }
        }else if($textareaString == $databaseWord){
            $extraTypedWord = $textareaString - $databaseWord;
            $totalErrorWord = $errorWord+$extraTypedWord;

            $successWordGreater = $textareaString - $totalErrorWord;

            $percentage = ($successWordGreater*100)/$databaseWord;

            if($percentage < 0){
                $percentage = 0;
            }else{
                $percentage = $percentage;
            }
            //$percentage = ($successWord*100)/$databaseWord;
        }else{
            $percentage = ($successWord*100)/$databaseWord;
        }

        //$percentage = ($successWord*100)/$databaseWord;

        echo $percentage.'%';

        //return view('view_report.liveScore')->with('percentage',$percentage); 
    }

    // function for force submit exam form
    public function forceSubmitExamForm(Request $request)
    {

        $step_id      = $request->step_id;
        $paragraph_id = $request->paragraph_id;
        $user_id      = $request->user_id;
        $exam_time    = $request->exam_time;
        $word         = $request->word;
        $c_time       = $request->c_time;
        $typed_word   = $request->inputTxt;
        $databaseWord = $request->databaseWord;
        $session_id   = $request->session_id;


        $typed_word_explode = explode(" ",$typed_word);

        foreach ($typed_word_explode as $key => $value) {
            $databaseWord_explode = explode(" ",$databaseWord);

            if($value != $databaseWord_explode[$key]){
                $wdata = array();
                $wdata['user_id']        = $user_id;
                $wdata['paragraph_id']   = $paragraph_id;
                $wdata['session_id']     = $session_id;
                $wdata['typedWord']      = $value;        
                $wdata['databaseWord']   = $databaseWord_explode[$key];        
                $wdata['created_at']     = $this->rcdate;       
                $wdata['created_time']   = $this->current_time;
                $wquery = DB::table('tbl_wrong_typed_word')->insert($wdata);
            }
        }

        $database_word_count = str_word_count($databaseWord);
        $typed_word_count    = str_word_count($typed_word);
        $wrong_word_count    = DB::table('tbl_wrong_typed_word')->where('session_id',$session_id)->count();

        $correct_typed_word = $typed_word_count-$wrong_word_count;
        $score = ($correct_typed_word*100)/$database_word_count;

        $data = array();
        $data['session_id']   = $session_id;
        $data['step_id']      = $step_id;
        $data['paragraph_id'] = $paragraph_id;
        $data['user_id']      = $user_id;
        $data['exam_time']    = $exam_time;
        $data['time_out']     = "1";
        $data['word']         = $word;
        $data['c_time']       = $c_time;
        $data['typed_word']   = str_word_count($typed_word);
        $data['wrong_word']   = $wrong_word_count;
        $data['score']        = $score;
        $data['created_time'] = $this->current_time;
        $data['created_at']   = $this->rcdate;

        $query = DB::table('tbl_exam_result')->insert($data);

        return "1";
    }

    // function for manually submit exam form
    public function manuallySubmitExamForm(Request $request)
    {
        $step_id      = $request->step_id;
        $paragraph_id = $request->paragraph_id;
        $user_id      = $request->user_id;
        $exam_time    = $request->exam_time;
        $word         = $request->word;
        $c_time       = $request->c_time;
        $typed_word   = $request->inputTxt;
        $databaseWord = $request->databaseWord;
        $session_id   = $request->session_id;


        $typed_word_explode = explode(" ",$typed_word);

        foreach ($typed_word_explode as $key => $value) {
            $databaseWord_explode = explode(" ",$databaseWord);

            if($value != $databaseWord_explode[$key]){
                $wdata = array();
                $wdata['user_id']        = $user_id;
                $wdata['paragraph_id']   = $paragraph_id;
                $wdata['session_id']     = $session_id;
                $wdata['typedWord']      = $value;        
                $wdata['databaseWord']   = $databaseWord_explode[$key];        
                $wdata['created_at']     = $this->rcdate;       
                $wdata['created_time']   = $this->current_time;
                $wquery = DB::table('tbl_wrong_typed_word')->insert($wdata);
            }
        }

        $database_word_count = str_word_count($databaseWord);
        $typed_word_count    = str_word_count($typed_word);
        $wrong_word_count    = DB::table('tbl_wrong_typed_word')->where('session_id',$session_id)->count();

        $correct_typed_word = $typed_word_count-$wrong_word_count;
        $score = ($correct_typed_word*100)/$database_word_count;

        $data = array();
        $data['session_id']   = $session_id;
        $data['step_id']      = $step_id;
        $data['paragraph_id'] = $paragraph_id;
        $data['user_id']      = $user_id;
        $data['exam_time']    = $exam_time;
        $data['time_out']     = "2";
        $data['word']         = $word;
        $data['c_time']       = $c_time;
        $data['typed_word']   = $typed_word_count;
        $data['wrong_word']   = $wrong_word_count;
        $data['score']        = $score;
        $data['created_time'] = $this->current_time;
        $data['created_at']   = $this->rcdate;
        $query = DB::table('tbl_exam_result')->insert($data);
        
        // var_dump($query);
        // exit();

        // return Redirect::to('examResult');

        return "2";
    }

    public function examResult()
    {
        $session_id = Session::get('session_id');
        $result = DB::table('tbl_exam_result')->where('session_id',$session_id)->where('user_id',Session::get('admin_id'))->first();
        return view('exam.examResult')->with('session_id',$session_id)->with('result',$result);
        // return "I Love Programming";
    }

    public function allSessions()
    {
        $result = DB::table('tbl_step')->get();
        return view('admin.allSessions')->with('result',$result);
    }

    public function sessionWiseExamReport($step_id)
    {
        $query = DB::table('tbl_exam_result')
        ->join('admin','tbl_exam_result.user_id','=','admin.id')
        ->join('tbl_step','tbl_exam_result.step_id','=','tbl_step.id')
        ->select('tbl_exam_result.*','admin.first_name','admin.last_name','admin.email','tbl_step.step_name')
        ->where('tbl_exam_result.step_id',$step_id)
        ->orderBy('tbl_exam_result.score','desc')
        ->get();

        return view('admin.sessionWiseExamReport')->with('query',$query);
    }

}
