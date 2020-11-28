<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;

class StepController extends Controller
{
    private $rcdate ;
    private $date_time ;

    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->rcdate = date('Y-m-d');
        $this->loged_id     = Session::get('admin_id');
        $this->current_time = date('H:i:s');
        $this->date_time    = date('Y-m-d H:i:s') ;
    }

    // function for add Step
    public function addStep()
    {
        $result = DB::table('tbl_paragraph')->get();
        return view('step.addStep')->with('result',$result);
    }

    // function for add step info
    public function addStepInfo(Request $request)
    {
        // Validation
        $this->validate($request, [
        'stepName'       => 'required',
        'paragraph_id'   => 'required',
        'amount'         => 'required',
        'confirm_amount' => 'required'
        ]);

        //Collecting data from html form
        $stepName       = trim($request->stepName);
        $paragraph_id   = trim($request->paragraph_id);
        $amount         = trim($request->amount);
        $confirm_amount = trim($request->confirm_amount);

        if($amount != $confirm_amount){
            Session::put('failed','Sorry ! Session amount & confirm amount did not match. Try again');
            return Redirect::to('addStep');
            exit();
        }

        //Check duplicatet primary category name
        $count = DB::table('tbl_step')
        ->where('step_name', $stepName)
        ->count();

        if($count > 0){
            Session::put('failed','Sorry ! '.$stepName. ' already exits. Try to add new Session');
            return Redirect::to('addStep');
            exit();
        }

        $data = array();
        $data['step_name']      = $stepName ;
        $data['paragraph_id']   = $paragraph_id ;
        $data['amount']         = $amount ;
        $data['created_at']     = $this->rcdate;

        $query = DB::table('tbl_step')->insert($data);

        if($query){
            Session::put('success','Congratulations, Session added sucessfully !!');
            return Redirect::to('addStep');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('addStep');
        }
    }

    // function for manage step
    public function manageStep()
    {
        $result = DB::table('tbl_step')
                    ->join('tbl_paragraph','tbl_paragraph.id','=','tbl_step.paragraph_id')
                    ->select('tbl_paragraph.paragraph_title','tbl_paragraph.paragraph','tbl_step.*')
                    ->get();
        return view('step.manageStep')->with('result',$result);
    }

    #--------------------- Edit Step --------------------#
    public function editStep($id)
    {
        $value = DB::table('tbl_step')
                    ->join('tbl_paragraph','tbl_paragraph.id','=','tbl_step.paragraph_id')
                    ->select('tbl_paragraph.paragraph_title','tbl_step.*')->where('tbl_step.id',$id)->first();

        return view('step.editStep')->with('value',$value);
    }

    #_--------------------- Update Step --------------------#
    public function updateStepInfo(Request $request)
    {
        // Validation
        $this->validate($request, [
        'stepName'   => 'required',
        'amount'     => 'required'
        ]);

        //Collecting data from html form
        $stepName   = trim($request->stepName);
        $primary_id = trim($request->primary_id);
        $amount         = trim($request->amount);

        //Check duplicatet primary category name
        $count = DB::table('tbl_step')
        ->where('step_name', $stepName)
        ->whereNotIn('id',[$primary_id])
        ->count();

        if($count > 0){
            Session::put('failed','Sorry ! '.$stepName. ' already exits. Try to add new Session');
            return Redirect::to('editStep/'.$primary_id);
            exit();
        }

        $data = array();
        $data['step_name'] = $stepName ;
        $data['amount']    = $amount ;

        $query = DB::table('tbl_step')->where('id',$primary_id)->update($data);

        if($query){
            Session::put('success','Congratulations, Session Updated sucessfully !!');
            return Redirect::to('editStep/'.$primary_id);
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('editStep/'.$primary_id);
        }
    }

    // function for delete step
    public function deleteStep($id)
    {
        $check = DB::table('tbl_exam_result')->where('step_id',$id)->count();
        if ($check > 0) {
            Session::put('failed','Sorry !! This Session already used in a Student.');
            return Redirect::to('manageStep');
        }

        $query = DB::table('tbl_step')->where('id',$id)->delete();
        if($query){
            Session::put('success','Congratulations, Session Deleted sucessfully !!');
            return Redirect::to('manageStep');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('manageStep');
        }
    }

    // function for change exam fee 
    public function changeExamFee()
    {
        $fee = DB::table('tbl_exam_fee')->first();
        return view('setting.changeExamFee')->with('fee',$fee);
    }

    // function for change exam fee info
    public function changeExamFeeInfo(Request $request)
    {
        // Validation
        $this->validate($request, [
        'amount'         => 'required',
        'confirm_amount' => 'required'
        ]);

        //Collecting data from html form
        $amount         = trim($request->amount);
        $confirm_amount = trim($request->confirm_amount);

        if($amount != $confirm_amount){
            Session::put('failed','Sorry !! Amount & Confirm Amount Did Not Match, try again.');
            return Redirect::to('changeExamFee');
        }

        $data = array();
        $data['amount']  = $amount ;
        $data['modified_at']  = $this->rcdate ;

        DB::table('tbl_exam_fee')->update($data);
        Session::put('success','Congratulations, Fee Amount Changed Sucessfully !!');
        return Redirect::to('changeExamFee');
    }



} // end of controller
