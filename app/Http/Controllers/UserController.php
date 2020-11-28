<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;

class UserController extends Controller
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

    // function for user signup area
    public function signin()
    {
        $step = DB::table('tbl_step')->get();
        $division_result = DB::table('tbl_division')->get();
        return view('website.signin')->with('division_result',$division_result)->with('step',$step);
    }

    // function for user signup area
    public function userSignUp()
    {
        $step = DB::table('tbl_step')->get();
        $division_result = DB::table('tbl_division')->get();
    	return view('user.userSignUp')->with('division_result',$division_result)->with('step',$step);
    }

    // function for user sign up info
    public function userSignupInfo(Request $request)
    {
    	$this->validate($request,[
            'student_name_english'      => 'required',
            'st_day'                    => 'required',
            'st_month'                  => 'required',
            'st_year'                   => 'required',
            'birth_registration_no'     => 'required',
            'student_email'             => 'required',
            'password'                  => 'required',
            'student_photo'             => 'mimes:jpeg,jpg,png|max:10000',
        ]);

        $unique_rand_first_three = rand(111,999);
        $unique_rand_last_nine   = rand(111111111,999999999);
        $unique_id        = $unique_rand_first_three.",".$unique_rand_last_nine;

        $registration_rand_first_three = rand(222,888);
        $registration_rand_first_nine   = rand(222222222,888888888);
        $registration_number        = $registration_rand_first_three.",".$registration_rand_first_nine;

        $step                   = trim($request->step);
        $pwd                    = trim($request->password);
        $salt                   = 'a123A321';
        $password               = sha1($pwd.$salt);
        $student_name_bangla    = trim($request->student_name_bangla);
        $student_name_english   = trim($request->student_name_english);
        $st_day                 = trim($request->st_day);
        $st_month               = trim($request->st_month);
        $st_year                = trim($request->st_year);
        $birth_registration_no  = trim($request->birth_registration_no);
        $birth_certificate_photo = $request->file('birth_certificate_photo');
        $student_blood_group    = trim($request->student_blood_group);
        $student_nid_number     = trim($request->student_nid_number);
        $nationality            = trim($request->nationality);
        $student_email          = trim($request->student_email);
        $gender                 = trim($request->gender);
        $religion               = trim($request->religion);
        $student_mobile         = trim($request->student_mobile);
        $occupation             = trim($request->occupation);
        $student_photo          = $request->file('student_photo');
        $st_exam_name_1         = trim($request->st_exam_name_1);
        $st_exam_name_2         = trim($request->st_exam_name_2);
        $st_department_1        = trim($request->st_department_1);
        $st_department_2        = trim($request->st_department_2);
        $st_institute_1         = trim($request->st_institute_1);
        $st_institute_2         = trim($request->st_institute_2);
        $st_year_1              = trim($request->st_year_1);
        $st_year_2              = trim($request->st_year_2);
        $st_board_1             = trim($request->st_board_1);
        $st_board_2             = trim($request->st_board_2);
        $st_grad_1              = trim($request->st_grad_1);
        $st_grad_2              = trim($request->st_grad_2);

        $student_birth_date     = $st_year.'-'.$st_month.'-'.$st_day ;

        $check_duplicate_birth_registrtion_no = DB::table('admin')->where('birth_registration_no',$birth_registration_no)->count();

        if ($check_duplicate_birth_registrtion_no > 0) {
            Session::put('failed','Sorry ! Student Birth Registration Number Already Exits.');
            return Redirect::to('/');
            exit();
        }
        $check_unique_id = DB::table('admin')->where('unique_id',$unique_id)->count();

        if ($check_unique_id > 0) {
            Session::put('failed','Sorry ! ID Number Already Exits.');
            return Redirect::to('/');
            exit();
        }

        $check_registration_number = DB::table('admin')->where('registration_number',$registration_number)->count();

        if ($check_registration_number > 0) {
            Session::put('failed','Sorry ! Registrationt Number Already Exits.');
            return Redirect::to('/');
            exit();
        }


        $father_name_english    = trim($request->father_name_english);
        $father_name_bangla     = trim($request->father_name_bangla);
        $f_day                  = trim($request->f_day);
        $f_month                = trim($request->f_month);
        $f_year                 = trim($request->f_year);
        $father_blood_group     = trim($request->father_blood_group);
        $father_nid_number      = trim($request->father_nid_number);
        $father_nid_scan_photo  = $request->file('father_nid_scan_photo');
        $father_nationality     = trim($request->father_nationality);
        $father_email           = trim($request->father_email);
        $father_religion        = trim($request->father_religion);
        $father_mobile          = trim($request->father_mobile);
        $father_occupation      = trim($request->father_occupation);
        $father_image           = $request->file('father_image');
        $fa_exam_name_1         = trim($request->fa_exam_name_1);
        $fa_exam_name_2         = trim($request->fa_exam_name_2);
        $fa_department_1        = trim($request->fa_department_1);
        $fa_department_2        = trim($request->fa_department_2);
        $fa_institute_1         = trim($request->fa_institute_1);
        $fa_institute_2         = trim($request->fa_institute_2);
        $fa_year_1              = trim($request->fa_year_1);
        $fa_year_2              = trim($request->fa_year_2);
        $fa_board_1             = trim($request->fa_board_1);
        $fa_board_2             = trim($request->fa_board_2);
        $fa_grad_1              = trim($request->fa_grad_1);
        $fa_grad_2              = trim($request->fa_grad_2);

        $father_birth_date      = $f_year.'-'.$f_month.'-'.$f_day ;


        $mother_name_english    = trim($request->mother_name_english);
        $mother_name_bangla     = trim($request->mother_name_bangla);
        $m_day                  = trim($request->m_day);
        $m_month                = trim($request->m_month);
        $m_year                 = trim($request->m_year);
        $mother_blood_group     = trim($request->mother_blood_group);
        $mother_nid_number      = trim($request->mother_nid_number);
        $mother_nid_scan_photo  = $request->file('mother_nid_scan_photo');
        $mother_nationality     = trim($request->mother_nationality);
        $mother_email           = trim($request->mother_email);
        $mother_religion        = trim($request->mother_religion);
        $mother_mobile          = trim($request->mother_mobile);
        $mother_occupation      = trim($request->mother_occupation);
        $mother_photo           = $request->file('mother_photo');
        $mo_exam_name_1         = trim($request->mo_exam_name_1);
        $mo_exam_name_2         = trim($request->mo_exam_name_2);
        $mo_department_1        = trim($request->mo_department_1);
        $mo_department_2        = trim($request->mo_department_2);
        $mo_institute_1         = trim($request->mo_institute_1);
        $mo_institute_2         = trim($request->mo_institute_2);
        $mo_year_1              = trim($request->mo_year_1);
        $mo_year_2              = trim($request->mo_year_2);
        $mo_board_1             = trim($request->mo_board_1);
        $mo_board_2             = trim($request->mo_board_2);
        $mo_grade_1             = trim($request->mo_grade_1);
        $mo_grade_2             = trim($request->mo_grade_2);

        $mother_birth_date      = $m_year.'-'.$m_month.'-'.$m_day ;
        $address_check = trim($request->address_check);
        if ($address_check == "") {
            $same_as_present = 0;
        }else{
            $same_as_present = 1;
        }

        $division_id            = trim($request->division_id);
        $division_id            = trim($request->division_id);
        $district_id            = trim($request->district_id);
        $thana_id               = trim($request->thana_id);
        $pre_post               = trim($request->pre_post);
        $pre_post_code          = trim($request->pre_post_code);
        $pre_village            = trim($request->pre_village);
        $pre_ward_number        = trim($request->pre_ward_number);
        $pre_road_number        = trim($request->pre_road_number);
        $pre_house_number       = trim($request->pre_house_number);


        $per_division_id        = trim($request->per_division_id);
        $per_district_id        = trim($request->per_district_id);
        $per_thana_id           = trim($request->per_thana_id);
        $per_post               = trim($request->per_post);
        $per_post_code          = trim($request->per_post_code);
        $per_village            = trim($request->per_village);
        $per_ward               = trim($request->per_ward);
        $per_road_number        = trim($request->per_road_number);
        $per_house_number       = trim($request->per_house_number);


        $data = array();
        $data['unique_id']              = $unique_id;
        $data['registration_number']    = $registration_number;
        $data['student_name_bangla']    = $student_name_bangla;
        $data['student_name_english']   = $student_name_english;
        $data['student_birth_date']     = $student_birth_date;
        $data['birth_registration_no']  = $birth_registration_no;
        $data['password']               = $password;
        $data['step_id']                = $step;
        $data['type']                   = "2";
        $data['status']                 = "1";

        if($birth_certificate_photo){
            $image_name2       = str_random(20);
            $ext               = strtolower($birth_certificate_photo->getClientOriginalExtension());
            $image_full_name4  ='student-'.$image_name2.'.'.$ext;
            $upload_path       = "images/";
            $image_url5        = $upload_path.$image_full_name4;
            $success           = $birth_certificate_photo->move($upload_path,$image_full_name4);
            $data['birth_certificate_photo'] = $image_url5;
        }else{
            // no image
            $data['birth_certificate_photo'] = '';
        }

        $data['student_blood_group']    = $student_blood_group;
        $data['student_nid_number']     = $student_nid_number;
        $data['nationality']            = $nationality;
        $data['student_email']          = $student_email;
        $data['gender']                 = $gender;
        $data['religion']               = $religion;
        $data['student_mobile']         = $student_mobile;
        $data['occupation']             = $occupation;

        if($student_photo){
            $image_name        = str_random(20);
            $ext               = strtolower($student_photo->getClientOriginalExtension());
            $image_full_name1  ='student-'.$image_name.'.'.$ext;
            $upload_path       = "public/images/user";
            $image_url1        = $upload_path.$image_full_name1;
            $success           = $student_photo->move($upload_path,$image_full_name1);
            $data['student_photo'] = $image_url1;
        }else{
            // no image
            $data['student_photo'] = '';
        }

        $data['st_exam_name_1']             = $st_exam_name_1;
        $data['st_department_1']            = $st_department_1;
        $data['st_institute_1']             = $st_institute_1;
        $data['st_year_1']                  = $st_year_1;
        $data['st_board_1']                 = $st_board_1;
        $data['st_grad_1']                  = $st_grad_1;
        $data['st_exam_name_2']             = $st_exam_name_2;
        $data['st_department_2']            = $st_department_2;
        $data['st_institute_2']             = $st_institute_2;
        $data['st_year_2']                  = $st_year_2;
        $data['st_board_2']                 = $st_board_2;
        $data['st_grad_2']                  = $st_grad_2;
        $data['father_name_english']        = $father_name_english;
        $data['father_name_bangla']         = $father_name_bangla;
        $data['father_birth_date']          = $father_birth_date;
        $data['father_blood_group']         = $father_blood_group;
        $data['father_nid_number']          = $father_nid_number;

        if($father_nid_scan_photo){
            $image_name7        = str_random(20);
            $ext               = strtolower($father_nid_scan_photo->getClientOriginalExtension());
            $image_full_name7  ='student-'.$image_name7.'.'.$ext;
            $upload_path       = "images/";
            $image_url7        = $upload_path.$image_full_name7;
            $success           = $father_nid_scan_photo->move($upload_path,$image_full_name7);
            $data['father_nid_scan_photo'] = $image_url7;
        }else{
            // no image
            $data['father_nid_scan_photo'] = '';
        }

        $data['father_nationality']         = $father_nationality;
        $data['father_email']               = $father_email;
        $data['father_religion']            = $father_religion;
        $data['father_mobile']              = $father_mobile;
        $data['father_occupation']          = $father_occupation;

        if($father_image){
            $image_name2        = str_random(20);
            $ext                = strtolower($father_image->getClientOriginalExtension());
            $image_full_name2   ='father-'.$image_name2.'.'.$ext;
            $upload_path        = "images/";
            $image_url1         = $upload_path.$image_full_name2;
            $success            = $father_image->move($upload_path,$image_full_name2);
            $data['father_image'] = $image_url1;
        }else{
            // no image
            $data['father_image'] = '';
        }

        $data['fa_exam_name_1']             = $fa_exam_name_1;
        $data['fa_department_1']            = $fa_department_1;
        $data['fa_institute_1']             = $fa_institute_1;
        $data['fa_year_1']                  = $fa_year_1;
        $data['fa_board_1']                 = $fa_board_1;
        $data['fa_grad_1']                  = $fa_grad_1;
        $data['fa_exam_name_2']             = $fa_exam_name_2;
        $data['fa_department_2']            = $fa_department_2;
        $data['fa_institute_2']             = $fa_institute_2;
        $data['fa_year_2']                  = $fa_year_2;
        $data['fa_board_2']                 = $fa_board_2;
        $data['fa_grad_2']                  = $fa_grad_2;
        $data['mother_name_english']        = $mother_name_english;
        $data['mother_name_bangla']         = $mother_name_bangla;
        $data['mother_birth_date']          = $mother_birth_date;
        $data['mother_blood_group']         = $mother_blood_group;
        $data['mother_nid_number']          = $mother_nid_number;
        

        if($mother_nid_scan_photo){
            $image_name8        = str_random(20);
            $ext               = strtolower($mother_nid_scan_photo->getClientOriginalExtension());
            $image_full_name8  ='student-'.$image_name8.'.'.$ext;
            $upload_path       = "images/";
            $image_url8        = $upload_path.$image_full_name8;
            $success           = $mother_nid_scan_photo->move($upload_path,$image_full_name8);
            $data['mother_nid_scan_photo'] = $image_url8;
        }else{
            // no image
            $data['mother_nid_scan_photo'] = '';
        }
        $data['mother_nationality']         = $mother_nationality;
        $data['mother_email']               = $mother_email;
        $data['mother_religion']            = $mother_religion;
        $data['mother_mobile']              = $mother_mobile;
        $data['mother_occupation']          = $mother_occupation;

        if($mother_photo){
            $image_name3        = str_random(20);
            $ext                = strtolower($mother_photo->getClientOriginalExtension());
            $image_full_name2   ='mother-'.$image_name3.'.'.$ext;
            $upload_path        = "images/";
            $image_url2         = $upload_path.$image_full_name2;
            $success            = $mother_photo->move($upload_path,$image_full_name2);
            $data['mother_photo'] = $image_url2;
        }else{
            // no image
            $data['mother_photo'] = '';
        }

        $data['mo_exam_name_1']             = $mo_exam_name_1;
        $data['mo_department_1']            = $mo_department_1;
        $data['mo_institute_1']             = $mo_institute_1;
        $data['mo_year_1']                  = $mo_year_1;
        $data['mo_board_1']                 = $mo_board_1;
        $data['mo_grade_1']                 = $mo_grade_1;
        $data['mo_exam_name_2']             = $mo_exam_name_2;
        $data['mo_department_2']            = $mo_department_2;
        $data['mo_institute_2']             = $mo_institute_2;
        $data['mo_year_2']                  = $mo_year_2;
        $data['mo_board_2']                 = $mo_board_2;
        $data['mo_grade_2']                 = $mo_grade_2;
        $data['pre_division_id']            = $division_id;
        $data['pre_district_id']            = $district_id;
        $data['pre_thana_id']               = $thana_id;
        $data['pre_post']                   = $pre_post;
        $data['pre_post_code']              = $pre_post_code;
        $data['pre_village']                = $pre_village;
        $data['pre_ward_number']            = $pre_ward_number;
        $data['pre_road_number']            = $pre_road_number;
        $data['pre_house_number']           = $pre_house_number;
        $data['pre_house_number']           = $pre_house_number;
        $data['same_as_present']            = $same_as_present;
        $data['per_division_id']            = $per_division_id;
        $data['per_district_id']            = $per_district_id;
        $data['per_thana_id']               = $per_thana_id;
        $data['per_post']                   = $per_post;
        $data['per_post_code']              = $per_post_code;
        $data['per_village']                = $per_village;
        $data['per_ward']                   = $per_ward;
        $data['per_road_number']            = $per_road_number;
        $data['created_date']               = $this->rcdate;

        $insert_info = DB::table('admin')->insert($data);
        Session::put('succes','User Sign Up Sucessfully');
        return Redirect::to('userSignUp');
        exit();

    }

    // function for unapproved user
    public function unapprovedUser()
    {
    	$users = DB::table('admin')
        ->join('tbl_registration_fee_payment','tbl_registration_fee_payment.user_id','=','admin.id')
        ->select('admin.*','tbl_registration_fee_payment.amount','tbl_registration_fee_payment.bkash_number','tbl_registration_fee_payment.transaction_id')
        ->where('admin.type',2)->where('admin.status',0)->get();
    	return view('user.unapprovedUser')->with('users',$users);
    }

    // function for approved user
    public function approveUser($id)
    {
        // registration fee payment table e status update
        $data2 = array();
        $data2['status'] = '1';
        DB::table('tbl_registration_fee_payment')->where('user_id',$id)->update($data2);
        // admin table status update
    	$data = array();
    	$data['status'] = '1';
    	$query = DB::table('admin')->where('type',2)->where('id',$id)->update($data);
        if($query){
            Session::put('success','Congratulations, User Approved Sucessfully Completed!!');
            return Redirect::to('unapprovedUser');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('unapprovedUser');
        }
    }

    // function for approved user
    public function rejectUser($id)
    {
        // registration fee payment table e status update
        $data2 = array();
        $data2['status'] = '2';
        DB::table('tbl_registration_fee_payment')->where('user_id',$id)->update($data2);
        // admin table status update
    	$data = array();
    	$data['status'] = '3';

    	$query = DB::table('admin')->where('type',2)->where('id',$id)->update($data);
        if($query){
            Session::put('success','Congratulations, User Reject Sucessfully Completed!!');
            return Redirect::to('unapprovedUser');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('unapprovedUser');
        }
    }

    // function for approved user
    public function approvedUser()
    {
    	$users = DB::table('admin')
        ->join('tbl_registration_fee_payment','tbl_registration_fee_payment.user_id','=','admin.id')
        ->select('admin.*','tbl_registration_fee_payment.amount','tbl_registration_fee_payment.bkash_number','tbl_registration_fee_payment.transaction_id')
        ->where('admin.type',2)->where('admin.status',1)->get();
    	return view('user.approvedUser')->with('users',$users);
    }

    // function for approved user change status
    public function approvedUserChangeStatus($id)
    {
        // registration fee payment table e status update
        $data2 = array();
        $data2['status'] = '0';
        DB::table('tbl_registration_fee_payment')->where('user_id',$id)->update($data2);
        // admin table status update
        $data = array();
        $data['status'] = '0';
        $query = DB::table('admin')->where('type',2)->where('id',$id)->update($data);
        if($query){
            Session::put('success','Congratulations, User Status Change Sucessfully Completed!!');
            return Redirect::to('approvedUser');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('approvedUser');
        }
    }

    // function for reject user
    public function rejectUserlist()
    {
        $users = DB::table('admin')
        ->join('tbl_registration_fee_payment','tbl_registration_fee_payment.user_id','=','admin.id')
        ->select('admin.*','tbl_registration_fee_payment.amount','tbl_registration_fee_payment.bkash_number','tbl_registration_fee_payment.transaction_id')
        ->where('admin.type',2)->where('admin.status',3)->get();
        return view('user.rejectUser')->with('users',$users);
    }

    // function for user change password
    public function userChangePassword()
    {
        return view('user.userChangePassword');
    }

    // function for save user change password info
    public function userChangePasswordInfo(Request $request)
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
            return Redirect::to('userChangePassword');
        }

        if($new_password != $confirm_password){
            Session::put('failed','New Password & Confirm Password Did not match, try again.');
            return Redirect::to('userChangePassword');
        }

        // insert password change history
        $data = array();
        $data['admin_id']       = $id ;
        $data['password']       = $new_password_salt ;
        $data['type']           = 2 ;
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
            return Redirect::to('userChangePassword');
        }

    }

    // function for user profile update
    public function userProfileUpdate()
    {
        return view('user.userProfileUpdate');
    }

    // function for user profile update info
    public function userProfileUpdateInfo(Request $request)
    {
        //Form validation
        $this->validate($request, [
        'firstName'   => 'required',
        'lastName'   => 'required',
        'email'  => 'required',
        'address' => 'required',
        'mobile'  => 'required',
        'image'   => 'mimes:jpeg,jpg,png|max:300'
        ]);

        // Collecting data from html form
        $firstName = trim($request->firstName);
        $lastName  = trim($request->lastName);
        $email    = trim($request->email);
        $address  = trim($request->address);
        $mobile   = trim($request->mobile);
        $image    = $request->file('image');
        $id       = $request->id;
        $current_image = $request->current_image;

        $data = array();
        $data['first_name']    = $firstName;
        $data['last_name']     = $lastName;
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
            return Redirect::to('userProfileUpdate');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('userProfileUpdate');
        }

    }

    #-------------------- Get District By Division ID --------------#
    public function getDistrictByDivision(Request $request)
    {
        $division_id = $request->division_id;

        $district_result = DB::table('tbl_district')->where('division_id',$division_id)->get();
        
        echo "<option value=''>Select District</option>";
        foreach ($district_result as $district_value) {
            echo "<option value='$district_value->id'>".$district_value->district_name."</option>";
        }
    } 

    #-------------------- Get Thana By District ID --------------#
    public function getThanaByDistrict(Request $request)
    {
        $district_id = $request->district_id;

        $thana_result = DB::table('tbl_upzela')->where('district_id',$district_id)->get();
        
        echo "<option value=''>Select Thana</option>";
        foreach ($thana_result as $thana_value) {
            echo "<option value='$thana_value->id'>".$thana_value->upzela_name."</option>";
        }
    }   

    #-------------------- Get District By Division ID --------------#
    public function getPerDistrictByDivision(Request $request)
    {
        $per_division_id = $request->per_division_id;

        $district_results = DB::table('tbl_district')->where('division_id',$per_division_id)->get();
        
        echo "<option value=''>Select District</option>";
        foreach ($district_results as $district_values) {
            echo "<option value='$district_values->id'>".$district_values->district_name."</option>";
        }
    } 

    #-------------------- Get Thana By District ID --------------#
    public function getPerThanaByDistrict(Request $request)
    {
        $per_district_id = $request->per_district_id;

        $thana_results = DB::table('tbl_upzela')->where('district_id',$per_district_id)->get();
        
        echo "<option value=''>Select Thana</option>";
        foreach ($thana_results as $thana_values) {
            echo "<option value='$thana_values->id'>".$thana_values->upzela_name."</option>";
        }
    }

} // end of user controller
