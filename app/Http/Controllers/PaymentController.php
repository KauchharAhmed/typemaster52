<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;

class PaymentController extends Controller
{

	// Contstruct Method
    private $rcdate ;
    private $date_time ;
    private $current_time ;
    private $logged_id ;

    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->rcdate 		= date('Y-m-d');
        $this->logged_id    = Session::get('admin_id');
        $this->current_time = date('H:i:s');
        $this->date_time    = date('Y-m-d H:i:s') ;
    }

    // Payment By Bkash
    public function paymentByBkash(Request $request)
    {

        // Validation
        $this->validate($request, [
        'amount' => 'required',
        'bkash_number' => 'required|size:11',
        'txrid' => 'required'
        ]);

        //Collecting data from html form

        $adminScan = DB::table('admin')->where('id',$this->logged_id)->first();
        $session_id = $adminScan->step_id;
        $paragraph_id = trim($request->paragraph_id);
        $amount = trim($request->amount);
        $bkash_number = trim($request->bkash_number);
        $transanction_id = trim($request->txrid);
        $session_amount = trim($request->session_amount);
        
        if($amount != $session_amount){
            Session::put('failed','Sorry !! Your Amount & Amount To Be Paid Did Not Match, try again.');
            return Redirect::to('startExam');
            exit();
        }

        //Check duplicatet user name
        $count = DB::table('tbl_payment')
        ->where('bkash_number', $bkash_number)
        ->where('transanction_id', $transanction_id)
        ->count();

        if($count > 0){
            Session::put('failed','Sorry ! Payment already exits. Try to add new payment');
            return Redirect::to('startExam');
            exit();
        }

        $data = array();
        $data['user_id']  = $this->logged_id;
        $data['session_id']  = $session_id;
        $data['paragraph_id']  = $paragraph_id;
        $data['amount']  = $amount;
        $data['bkash_number']  = $bkash_number;
        $data['transanction_id']  = $transanction_id;
        $data['created_at']  = $this->rcdate;
        $data['created_date_time']  = $this->date_time;

        $query = DB::table('tbl_payment')->insert($data);

        $current_date_time = date('Y-m-d H:i:s');
        $exam_start_date   = date('M d Y H:i:s', strtotime("+48 hours", strtotime($current_date_time)));
        $exam_end_date2    = date('M d Y H:i:s', strtotime("+168 hours", strtotime($exam_start_date)));
        $exam_end_date = date('Y-m-d H:i:s',strtotime($exam_end_date2));
        $data2 = array();
        $data2['exam_end_date'] = $exam_end_date;
        DB::table('admin')->where('id',$this->logged_id)->update($data2);

        if($query){
            Session::put('success','Congratulation :: Payment added sucessfully, wait for confirmation !!');
            return Redirect::to('startExam');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('startExam');
        } 
    }


    // function for registration fee payment
    public function registrationFeePayment($user_id,$random_number_encode)
    {
        return view('payment.registrationFeePayment')->with('user_id',$user_id)->with('random_number_encode',$random_number_encode);
    }

    // function for payment registration fee
    public function paymentRegistrationFee(Request $request)
    {
        // Validation
        $this->validate($request, [
        'amount'        => 'required',
        'confirmAmount' => 'required',
        'sentBkashNumber' => 'required|size:11',
        'txrid'           => 'required'
        ]);

        // collect html data
        $amount          = trim($request->amount);
        $confirmAmount   = trim($request->confirmAmount);
        $sentBkashNumber = trim($request->sentBkashNumber);
        $txrid           = trim($request->txrid);
        $user_id_encode  = trim($request->user_id);
        $user_id_decode  = base64_decode($user_id_encode);
        $random_number_encode  = trim($request->random_number_encode);
        $random_number_decode  = base64_decode($random_number_encode);

        if($amount != $confirmAmount){
            Session::put('failed','Sorry !! Amount & Confirm Amount Did Not Match, try again.');
            return Redirect::to('registrationFeePayment/'.$user_id_encode.'/'.$random_number_encode);
            exit();
        }

        $registrationQuery = DB::table('tbl_exam_fee')->first();
        $fee = $registrationQuery->amount;

        if($fee != $amount){
            Session::put('failed','Sorry !! Your Amount & Amount To Be Paid Did Not Match, try again.');
            return Redirect::to('registrationFeePayment/'.$user_id_encode.'/'.$random_number_encode);
            exit();
        }

        // check duplicate user id
        $duplicate = DB::table('tbl_registration_fee_payment')->where('user_id',$user_id_decode)->count();
        if($duplicate > 0){
            Session::put('failed','Sorry !! Your Registration Fee Already Paid.');
            return Redirect::to('registrationFeePayment/'.$user_id_encode.'/'.$random_number_encode);
            exit();
        }

        //Check duplicatet user name
        $count = DB::table('tbl_registration_fee_payment')
        ->where('bkash_number', $sentBkashNumber)
        ->where('transaction_id', $txrid)
        ->count();

        if($count > 0){
            Session::put('failed','Sorry ! Payment already exits. Try to add new payment');
            return Redirect::to('registrationFeePayment/'.$user_id_encode.'/'.$random_number_encode);
            exit();
        }

        $data = array();
        $data['user_id']        = $user_id_decode;
        $data['random_number']  = $random_number_decode;
        $data['amount']         = $amount;
        $data['bkash_number']   = $sentBkashNumber;
        $data['transaction_id'] = $txrid;
        $data['status']     = "0";
        $data['created_at'] = $this->rcdate;
        DB::table('tbl_registration_fee_payment')->insert($data);
        Session::put('success','Congratulations, We are reviewing your transanction please be patient, once it verified our system will confirm you by sms. It will take time 48 to 72 Hours');
        return Redirect::to('registrationFeePayment/'.$user_id_encode.'/'.$random_number_encode);


    }

    // function for approve exam fee
    public function unapprovedExamFee()
    {
        $result = DB::table('tbl_payment')
                ->join('admin','admin.id','=','tbl_payment.user_id')
                ->select('tbl_payment.*','admin.first_name','admin.last_name','admin.email')
                ->where('tbl_payment.status',0)
                ->get();
        return view('examfee.unapprovedExamFee')->with('result',$result);
    }

    // function for approved exam fee
    public function approveExamFee($id)
    {
        $data = array();
        $data['status'] = "1";
        DB::table('tbl_payment')->where('id',$id)->update($data);
        Session::put('success','Congratulations, Exam Fee Transaction Approved Successfully.');
        return Redirect::to('unapprovedExamFee');
    }

    // function for approve exam fee
    public function approvedExamFee()
    {
        $result = DB::table('tbl_payment')
                ->join('admin','admin.id','=','tbl_payment.user_id')
                ->select('tbl_payment.*','admin.first_name','admin.last_name','admin.email')
                ->where('tbl_payment.status',1)
                ->get();
        return view('examfee.approvedExamFee')->with('result',$result);
    }

    // function for reject exam fee
    public function rejectExamFee($id)
    {
        $data = array();
        $data['status'] = "2";
        DB::table('tbl_payment')->where('id',$id)->update($data);
        Session::put('success','Congratulations, Exam Fee Transaction Rejected Successfully.');
        return Redirect::to('unapprovedExamFee');
    }

    // function for rejected exam fee
    public function rejectedExamFee()
    {
        $result = DB::table('tbl_payment')
                ->join('admin','admin.id','=','tbl_payment.user_id')
                ->select('tbl_payment.*','admin.first_name','admin.last_name','admin.email')
                ->where('tbl_payment.status',2)
                ->get();
        return view('examfee.rejectedExamFee')->with('result',$result);
    }

}
