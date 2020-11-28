<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;
use DateTime;


class AdminController extends Controller
{
    private $rcdate ;
    private $loged_id;
    private $date_time ;

    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->rcdate = date('Y-m-d');
        $this->loged_id     = Session::get('admin_id');
        $this->current_time = date('H:i:s');
        $this->date_time    = date('Y-m-d H:i:s') ;
    }

    /**
     * Display admin login page.
     *
     * @return \Illuminate\Http\Response
     */
    // function for admin login page
    public function index()
    {
    	return view('admin.index');
    }

    /**
     * login process for admin or seller.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // BEGINING OF ADMIN LOGIN

    public function accessPermission(Request $request)
    {
        // Form validation
        // $this->validate($request, [
        // 'login_username'  => 'required',
        // 'login_password'  => 'required',
        // ]);


        // Collecting data from html form
        $email     = trim($request->login_username);
        $pwd       = trim($request->login_password);
        $salt      = 'a123A321';
        $password  = sha1($pwd.$salt);

        if($email == ''){
            return "e";
            exit();            
        }

        if($pwd == ''){
            return "p";
            exit();            
        }

        // Query for matching the provided data whether information found or not
        $count = DB::table('admin')
        ->where('email', $email)
        ->where('password', $password)
        ->where('status',1)
        ->count();

        // return $count;
        // exit();

        // if query get some match then retrieve the first row data
        if($count > 0){
            $admin_login = DB::table('admin')
            ->where('email', $email)
            ->where('password', $password)
            ->where('status',1)
            ->first();

            // checking user type
            $type = $admin_login->type;

            if($type == '1'){
                // Storing data in session variable, 1 means admin
                Session::put('admin_name',$admin_login->first_name.' '.$admin_login->last_name);
                Session::put('admin_id',$admin_login->id);
                Session::put('type',$admin_login->type);
                Session::put('photo',$admin_login->image);
                return "1";
                exit();
            }

        }else{
            //Session::put('login_failed','<b>Wrong information provided. Try again !!</b>');
            // return Redirect::to('/apanel');
            return "69";
            exit();  
        }
    }

    // BEGINING OF ADMIN LOGIN

    public function userloginProcess(Request $request)
    {
        // Form validation
        $this->validate($request, [
        'login_username'  => 'required',
        'login_password'  => 'required'
        ]);

        // Collecting data from html form
        $email     = trim($request->login_username);
        $pwd       = trim($request->login_password);
        $salt      = 'a123A321';
        $password  = sha1($pwd.$salt);

        // Query for matching the provided data whether information found or not
        $count = DB::table('admin')
        ->where('email', $email)
        ->where('password', $password)
        ->where('status',1)
        ->count();

        // echo $count;
        // exit();

        // if query get some match then retrieve the first row data
        if($count > 0){
            $admin_login = DB::table('admin')
            ->where('email', $email)
            ->where('password', $password)
            ->where('status',1)
            ->first();

            // checking user type
            $type = $admin_login->type;
            $admin_full_name = $admin_login->first_name.' '.$admin_login->last_name;

            if($type == '1'){
                // Storing data in session variable, 1 means admin
                Session::put('admin_name',$admin_full_name);
                Session::put('admin_id',$admin_login->id);
                Session::put('type',$admin_login->type);
                Session::put('photo',$admin_login->image);
                return Redirect::to('/adminDashboard');
            }else{
                // Storing data in session variable, 2 means manager
                Session::put('admin_name',$admin_full_name);
                Session::put('admin_id',$admin_login->id);
                Session::put('type',$admin_login->type);
                Session::put('photo',$admin_login->image);
                return Redirect::to('/entrepreneurDashboard');  
            }

        }else{
            Session::put('login_faild','<b>Wrong information provided. Try again !!</b>');
            return Redirect::to('/');
            exit();  
            // return "69";
        }
    }

    // END OF ADMIN LOGIN PROCESS

    // function for load admin dashboard
    public function adminDashboard()
    {
        $query = DB::table('tbl_exam_result')
        ->join('admin','tbl_exam_result.user_id','=','admin.id')
        ->join('tbl_step','tbl_exam_result.step_id','=','tbl_step.id')
        ->select('tbl_exam_result.*','admin.first_name','admin.last_name','admin.email','tbl_step.step_name')
        ->orderBy('tbl_exam_result.score','desc')
        ->get();
        return view('admin.adminDashboard')->with('query',$query);
    }

    // function for load admin dashboard
    public function entrepreneurDashboard()
    {
        $query = DB::table('tbl_exam_result')
        ->join('admin','tbl_exam_result.user_id','=','admin.id')
        ->join('tbl_step','tbl_exam_result.step_id','=','tbl_step.id')
        ->select('tbl_exam_result.*','admin.first_name','admin.last_name','admin.email','tbl_step.step_name')
        ->orderBy('tbl_exam_result.score','desc')
        ->get();

    	return view('admin.entrepreneurDashboard')->with('query',$query);
    }

    /**
     * super admin logout process 
     * @return \Illuminate\Http\Response
     */
    public function adminLogout()
    {
        Session::put('admin_id',null);
        Session::put('type',null);
        return Redirect::to('/');
    }

    public function userLogout()
    {
        Session::put('admin_id',null);
        Session::put('type',null);
        return Redirect::to('/');
    }

    // function for change password
    public function changePassword()
    {
        return view('admin.changePassword');
    }

    // function for save admin change password info
    public function adminChangePasswordInfo(Request $request)
    {
        //Form validation
        $this->validate($request, [
        'old_password'  => 'required',
        'new_password'  => 'required',
        'confirm_password'  => 'required'
        ]);

        // Collecting data from html form
        $old_password     = trim($request->old_password);
        $new_password     = trim($request->new_password);
        $confirm_password = trim($request->confirm_password);
        $id =               trim($request->id);
        $salt      = 'a123A321';
        $old_password_salt = sha1($old_password.$salt);
        $new_password_salt = sha1($new_password.$salt);

        $check_old_password = DB::table('admin')->where('id',$id)->where('password',$old_password_salt)->count();
        if ($check_old_password == '0') {
            Session::put('failed','Your Old Password Did not match, try again.');
            return Redirect::to('changePassword');
        }

        if($new_password != $confirm_password){
            Session::put('failed','New Password & Confirm Password Did not match, try again.');
            return Redirect::to('changePassword');
        }

        // insert password change history
        $data = array();
        $data['admin_id']       = $id ;
        $data['password']       = $new_password_salt ;
        $data['type']           = 1 ;
        $data['status']         = 1 ;
        $data['created_time']   = $this->current_time ;
        $data['created_at']     = $this->rcdate ;
        DB::table('tbl_password_change_history')->insert($data);

        // change the password
        $data1 = array();
        $data1['password'] = $new_password_salt ;
        $query = DB::table('admin')->where('id',$id)->update($data1);

        if($query){
            Session::put('admin_id',null);
            Session::put('type',null);
            Session::put('password_change','Password Change Sucessfully'); 
            return Redirect::to('/');
        }else{
            Session::put('failed','Sorry !Error Occured. Try Again');
            return Redirect::to('changePassword');
        }

    }

    // function for update profile
    public function updateProfile()
    {
        return view('admin.updateProfile');
    }

    // function for update profile info
    public function updateProfileInfo(Request $request)
    {
        //Form validation
        $this->validate($request, [
        'name'   => 'required',
        'email'  => 'required',
        'address' => 'required',
        'mobile'  => 'required',
        'image'   => 'mimes:jpeg,jpg,png|max:300'
        ]);

        // Collecting data from html form
        $name     = trim($request->name);
        $email    = trim($request->email);
        $address  = trim($request->address);
        $mobile   = trim($request->mobile);
        $image    = $request->file('image');
        $id       = $request->id;
        $current_image = $request->current_image;

        $data = array();
        $data['name']    = $name;
        $data['email']   = $email;
        $data['address'] = $address;
        $data['mobile']  = $mobile;
        $data['modified_at'] = $this->rcdate;

        if (!empty($image)) {
            $image_name        = str_random(10).time();
            $ext               = strtolower($image->getClientOriginalExtension());
            $image_full_name   = $image_name.'.'.$ext;
            $upload_path       = "public/images/user";
            $image_url         = $image_full_name;
            $success           = $image->move($upload_path,$image_full_name);

            if ($current_image != "") {
                unlink("public/images/user/".$current_image);
            }

            $data['image'] = $image_url;
        }else{
            $data['image'] = '';
        }

        $query = DB::table('admin')->where('id',$id)->update($data);
        if($query){
            Session::put('success','Congratulations, Profile Update Sucessfully!!');
            return Redirect::to('updateProfile');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('updateProfile');
        }

    }

    // function for user registration process
    public function userRegistrationProcess(Request $request)
    {
        //Form validation
        $this->validate($request, [
        'first_name'  => 'required',
        'last_name'   => 'required',
        'username'    => 'required',
        'password'    => 'required',
        'day'         => 'required',
        'month'       => 'required',
        'year'        => 'required',
        'mobile'      => 'required|size:11',
        'birth_certificate_no' => 'required'
        ]);

        // Collecting data from html form
        $first_name = trim($request->first_name);
        $last_name  = trim($request->last_name);
        $username   = trim($request->username);
        $pwd        = trim($request->password);
        $confirm_pwd = trim($request->confirmPassword);
        $salt       = 'a123A321';
        $password   = sha1($pwd.$salt);
        $day        = trim($request->day);
        $month      = trim($request->month);
        $year       = trim($request->year);
        $mobile     = trim($request->mobile);
        $nid        = trim($request->nid);
        $gender     = trim($request->gender);
        $birth_certificate_no = trim($request->birth_certificate_no);
        $birthdate = $year.'-'.$month.'-'.$day;

        // echo $birthdate;
        // exit();

        if($pwd != $confirm_pwd){
            Session::put('failed','Sorry ! Your Password & Confirm Password Did Not Match.');
            return Redirect::to('/');
            exit();
        }

        $check_username = DB::table('admin')->where('email',$username)->count();
        if($check_username > 0){
            Session::put('failed','Sorry ! Username Already Exists.');
            return Redirect::to('/');
            exit();
        }

        $check_mobile = DB::table('admin')->where('mobile',$mobile)->count();
        if($check_mobile > 0){
            Session::put('failed','Sorry ! Mobile Number Already Exists.');
            return Redirect::to('/');
            exit();
        }

        $check_birth_certificate_no = DB::table('admin')->where('birth_certificate_no',$birth_certificate_no)->count();
        if($check_birth_certificate_no > 0){
            Session::put('failed','Sorry ! Birth Certificate Number Already Exists.');
            return Redirect::to('/');
            exit();
        }

        // $check_nid = DB::table('admin')->where('nid_no',$nid)->count();
        // if($check_nid > 0){
        //     Session::put('failed','Sorry ! NID Number Already Exists.');
        //     return Redirect::to('/');
        //     exit();
        // }

        $bday = new DateTime($day.'.'.$month.'.'.$year); // Your date of birth
        $today = new Datetime(date('m.d.y'));
        $diff = $today->diff($bday);

        if($diff->y >= '25'){
            if($nid == ''){
                Session::put('failed',' Sorry !Your Age is 25 or Morethan 25 Years Old.Your Nid is Required.');
                return Redirect::to('/');
                exit();
            }
        }

        $data = array();
        $data['first_name'] = $first_name;
        $data['last_name']  = $last_name;
        $data['email']      = $username;
        $data['mobile']     = $mobile;
        $data['gender']     = $gender;
        $data['password']   = $password;
        $data['birthdate']  = $birthdate;
        $data['birth_certificate_no']  = $birth_certificate_no;
        $data['nid_no']     = $nid;
        $data['address']    = "";
        $data['type']       = "2";
        $data['status']     = "0";
        $data['created_at'] = $this->rcdate;
        DB::table('admin')->insert($data);

        $studentName = $first_name.' '.$last_name;
        // $get_last_id = DB::table('admin')->where('email',$username)->where('mobile',$mobile)->first();
        // $user_id = base64_encode($get_last_id->id);
        // $random_number = substr(microtime(),2,6).rand(7586,1234);
        // $random_number_encode = base64_encode($random_number);
        // return Redirect::to('registrationFeePayment/'.$user_id.'/'.$random_number_encode);
        return Redirect::to('makePayment/'.$studentName.'/'.$username.'/'.$mobile);


    }

    

} // end of controller
