<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class WalletmixController extends Controller
{

     private $rcdate ;
     private $loged_id ;
     private $current_time ;
     private $current_year ;
     /**
     * SMS CLASS costructor 
     *
     */
    public function __construct()
    {
    	date_default_timezone_set('Asia/Dhaka');
    	$this->rcdate       = date('Y-m-d');
        $this->loged_id     = Session::get('admin_id');
        $this->current_time = date("H:i:s");
        $this->current_year = date("Y");
    }    

	//Check Server 
	public function getWMXServerData(){
        $url = "https://sandbox.walletmix.com/check-server";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_FOLLOWLOCATION => true
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function makePayment($studentName,$username,$mobile)
    {
        // Validation
        // $this->validate($request, [
        // 'user_id' => 'required',
        // 'student_index' => 'required',
        // 'student_name' => 'required'
        // ]);

        //Collecting data from html form
        // $user_id = trim($request->user_id);
        // $student_index = trim($request->student_index);
        // $student_name = trim($request->student_name);

        $merchant_order_id  = rand(111112,888889);
        $merchant_ref_id    = rand(334335,987415);
        $customer_add = "Gazipur, Dhaka";
        $product_desc = "Registration Fee of Smart Typing ";

        $callback_url = "https://smart-typing.com/paymentSuccess";

        $general = DB::table('tbl_payment_gateway')->first();
        $feeQuery = DB::table('tbl_exam_fee')->first();
        $userQuery = DB::table('admin')->where('email',$username)->first();
        $user_id = $userQuery->id;

        $serverData = json_decode($this->getWMXServerData());
        $url = $serverData->url;
        $app_name = $general->wmx_app_name;
        $options = (base64_encode('s='.$app_name.',i='.\request()->ip()));
        $wmx_id = $general->wmx_id;
        $access_app_key = $general->wmx_access_app_key;
        $access_username = $general->wmx_access_username;
        $access_password = $general->wmx_access_password;
        $authorization = 'Basic '.base64_encode($access_username.':'.$access_password);
        $cart_info = $wmx_id.','.$app_name.','.'flight';
		
        $data = [
            'wmx_id' => $wmx_id,
            'merchant_order_id' => $merchant_order_id,
            'merchant_ref_id' => $merchant_ref_id,
            'app_name' => $app_name,
            'cart_info' => $cart_info,
            'customer_name' => $studentName,
            'customer_email' => $username,
            'customer_add' => $customer_add,
            'customer_phone' => $mobile,
            'product_desc' => $product_desc,
            'amount' => $feeQuery->amount,
            'currency' => 'BDT',
            'options' => $options,
            'callback_url' => $callback_url,
            'access_app_key' => $access_app_key,
            'authorization' => $authorization,
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
        ));
        
        $resp = curl_exec($curl);
        curl_close($curl);
        
        $json = json_decode($resp);
        $token = $json->token;
        
        Session::put($token.'_user_id',$user_id);
        Session::put($token.'_username',$username);
        
        return Redirect::to('http://sandbox.walletmix.com/bank-payment-process/'.$token);

    }



	//Check Payment 
	public function checkPayment(Request $request){
	    
	    $postbackValues = $request->merchant_txn_data;
	    $postback = json_decode($postbackValues);
	    $token = $postback->token;
        $username = $postback->username;
	    
	   // echo $token;
	   // exit();
	    
        $general = DB::table('tbl_payment_gateway')->where('id',1)->first();
        $wmx_id = $general->wmx_id;
        $access_app_key = $general->wmx_access_app_key;
        $access_username = $general->wmx_access_username;
        $access_password = $general->wmx_access_password;
        $authorization = 'Basic '.base64_encode($access_username.':'.$access_password);

        $data = [
            'wmx_id' => $wmx_id,
            'authorization' => $authorization,
            'access_app_key' => $access_app_key,
            'token' => $token
        ];

        $url = "https://sandbox.walletmix.com/check-payment";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
        ));
        
        $resp = curl_exec($curl);
        curl_close($curl);
        $softxbd = json_decode($resp);

        // var_dump($softxbd);
        // exit();

        $data = array();
        $data['token'] = $softxbd->token;
        $data['user_id'] = Session::get($token.'_user_id');
        $data['user_index'] = Session::get($token.'_username');
        $data['created_at'] = date('Y-m-d');
        DB::table('tbl_walletmix')->insert($data);

        $user_query = DB::table('admin')->where('email',$username)->first();
        $user_id    = $user_query->id;
        $feeQuery = DB::table('tbl_exam_fee')->first();

        $data_two = array();
        $data_two['user_id']        = $user_id;
        $data_two['amount']         = $feeQuery->amount;
        $data_two['created_at']     = date('Y-m-d');
        DB::table('tbl_registration_fee_payment')->insert($data_two);

        // admin table status update
        $dataUpdate = array();
        $dataUpdate['status'] = '1';
        DB::table('admin')->where('type',2)->where('email',$username)->update($dataUpdate);
        return view('website.paymentSuccess');
        
    }

    // Function for make exam fee payment
    public function makeExamFeePayment($admin_id)
    {
        // Validation
        // $this->validate($request, [
        // 'user_id' => 'required',
        // 'student_index' => 'required',
        // 'student_name' => 'required'
        // ]);

        //Collecting data from html form
        // $user_id = trim($request->user_id);
        // $student_index = trim($request->student_index);
        // $student_name = trim($request->student_name);


        $merchant_order_id  = rand(111112,888889);
        $merchant_ref_id    = rand(334335,987415);

        $callback_url = "https://smart-typing.com/examFeePaymentSuccess";

        $general = DB::table('tbl_payment_gateway')->first();
        $feeQuery = DB::table('tbl_exam_fee')->first();
        $userQuery = DB::table('admin')->where('id',$admin_id)->first();
        $studentName = $userQuery->first_name.' '.$userQuery->last_name;
        $username = $userQuery->email;
        $user_id = $userQuery->id;
        $step_id = $userQuery->step_id;
        $sessionQuery = DB::table('tbl_step')->where('id',$step_id)->first();
        $product_desc = "Exam Fee of Smart Typing. Session : ".$sessionQuery->step_name;
        $customer_add = "Gazipur, Dhaka";
        $mobile = $userQuery->mobile;

        $serverData = json_decode($this->getWMXServerData());
        $url = $serverData->url;
        $app_name = $general->wmx_app_name;
        $options = (base64_encode('s='.$app_name.',i='.\request()->ip()));
        $wmx_id = $general->wmx_id;
        $access_app_key = $general->wmx_access_app_key;
        $access_username = $general->wmx_access_username;
        $access_password = $general->wmx_access_password;
        $authorization = 'Basic '.base64_encode($access_username.':'.$access_password);
        $cart_info = $wmx_id.','.$app_name.','.'flight';
        
        $data = [
            'wmx_id' => $wmx_id,
            'merchant_order_id' => $merchant_order_id,
            'merchant_ref_id' => $merchant_ref_id,
            'app_name' => $app_name,
            'cart_info' => $cart_info,
            'customer_name' => $studentName,
            'customer_email' => $username,
            'customer_add' => $customer_add,
            'customer_phone' => $mobile,
            'product_desc' => $product_desc,
            'amount' => $sessionQuery->amount,
            'currency' => 'BDT',
            'options' => $options,
            'callback_url' => $callback_url,
            'access_app_key' => $access_app_key,
            'authorization' => $authorization,
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
        ));
        
        $resp = curl_exec($curl);
        curl_close($curl);
        
        $json = json_decode($resp);
        $token = $json->token;
        
        Session::put($token.'_user_id',$user_id);
        Session::put($token.'_username',$username);
        
        return Redirect::to('http://sandbox.walletmix.com/bank-payment-process/'.$token.'/'.$username);
    }

    // Function for checkpayment 2
    public function checkPaymentTwo(Request $request)
    {
        $postbackValues = $request->merchant_txn_data;
        $postback = json_decode($postbackValues);
        $token = $postback->token;
        $username = $postback->username;
        
       // echo $token;
       // exit();
        
        $general = DB::table('tbl_payment_gateway')->where('id',1)->first();
        $wmx_id = $general->wmx_id;
        $access_app_key = $general->wmx_access_app_key;
        $access_username = $general->wmx_access_username;
        $access_password = $general->wmx_access_password;
        $authorization = 'Basic '.base64_encode($access_username.':'.$access_password);

        $data = [
            'wmx_id' => $wmx_id,
            'authorization' => $authorization,
            'access_app_key' => $access_app_key,
            'token' => $token
        ];

        $url = "https://sandbox.walletmix.com/check-payment";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
        ));
        
        $resp = curl_exec($curl);
        curl_close($curl);
        $softxbd = json_decode($resp);

        // var_dump($softxbd);
        // exit();

        $data = array();
        $data['token'] = $softxbd->token;
        $data['user_id'] = Session::get($token.'_user_id');
        $data['user_index'] = Session::get($token.'username');
        $data['created_at'] = date('Y-m-d');
        DB::table('tbl_walletmix')->insert($data);

        $user_query = DB::table('admin')->where('email',$username)->first();
        $user_id    = $user_query->id;
        $session_id = $user_query->step_id;
        $sessionQuery = DB::table('tbl_step')->where('id',$session_id)->first();

        $data_two = array();
        $data_two['user_id']       = $user_id;
        $data_two['session_id']    = $session_id;
        $data_two['paragraph_id']  = "";
        $data_two['amount']        = $sessionQuery->amount;
        $data_two['created_at']         = date('Y-m-d');
        $data_two['created_date_time']  = date('Y-m-d H:i:s');
        DB::table('tbl_payment')->insert($data_two);

        $exam_start_date = date('Y-m-d H:i:s');
        // $exam_start_date   = date('M d Y H:i:s', strtotime("+48 hours", strtotime($current_date_time)));
        $exam_end_date2    = date('M d Y H:i:s', strtotime("+168 hours", strtotime($exam_start_date)));
        $exam_end_date = date('Y-m-d H:i:s',strtotime($exam_end_date2));
        $data2 = array();
        $data2['exam_end_date'] = $exam_end_date;
        DB::table('admin')->where('id',$user_id)->update($data2);

        // table tbl_payment update
        $data_three = array();
        $data_three['status'] = "1";
        DB::table('tbl_payment')->where('user_id',$user_id)->update($data_three);
        return view('website.paymentSuccess');
    }    

}