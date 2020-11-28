<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;
use DateTime;

class SliderController extends Controller
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
    
    // function for add slider
    public function addSlider()
    {
    	return view('slider.addSlider');
    }

    // function for add slider info
    public function addSliderInfo(Request $request)
    {
    	// Validation
        $this->validate($request, [
        'sliderImage' => 'mimes:jpeg,jpg,png|max:600'
        ]);

        //Collecting data from html form
        $image      = $request->file('sliderImage');

        if (empty($image)) {
            Session::put('failed','Sorry !! No Slider Image Selected, Try Again.');
            return Redirect::to('addSlider');
            exit();
        }else{
            $image_name        = str_random(10).time();
            $ext               = strtolower($image->getClientOriginalExtension());
            $image_full_name   = $image_name.'.'.$ext;
            $upload_path       = "public/images/slider/";
            $image_url         = $image_full_name;
            $success           = $image->move($upload_path,$image_full_name);

            $data = array();
            $data['slider_image']       = $image_url;
            $data['status']             = "0";
            $data['created_at']         = $this->rcdate;

            $query = DB::table('tbl_slider')->insert($data);
        }

        if($query){
            Session::put('success','Congratulations, Slider Uploaded sucessfully !!');
            return Redirect::to('addSlider');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('addSlider');
        }
    }

    // function for manage file upload 
    public function manageSlider()
    {
        $result = DB::table('tbl_slider')
                        ->where('status',0)
                        ->get();
        return view('slider.manageSlider')
                    ->with('result',$result);
    }

    // function for edit slider
    public function editSlider($id)
    {
    	$editSlider = DB::table('tbl_slider')->where('id',$id)->first();
    	return view('slider.editSlider')->with('editSlider',$editSlider);
    }

    // function for update slider
    public function updateSlider(Request $request)
    {
    	 // Validation
        $this->validate($request, [
        'sliderImage'        => 'mimes:jpeg,jpg,png|max:1000'
        ]);

        //Collecting data from html form
        $image              = $request->file('sliderImage');
        $id                 = trim($request->id);
        $current_image      = trim($request->current_image);

        if (empty($image)) {
        	Session::put('failed','Sorry !! No Slider Image Selected, Try Again.');
            return Redirect::to('editSlider/'.$id);
            exit();
        }else{

            $image_name        = str_random(10).time();
            $ext               = strtolower($image->getClientOriginalExtension());
            $image_full_name   = $image_name.'.'.$ext;
            $upload_path       = "public/images/slider/";
            $image_url         = $image_full_name;
            $success           = $image->move($upload_path,$image_full_name);

            if ($current_image != "") {
                unlink("public/images/slider/".$current_image);
            }

            $data = array();
            $data['slider_image']   = $image_url;
            $data['modified_at']    = $this->rcdate;       

            $query = DB::table('tbl_slider')
                        ->where('id',$id)
                        ->update($data);

            if($query){
                Session::put('success','Congratulations, Slider Updated sucessfully !!');
                return Redirect::to('manageSlider');
            }else{
                Session::put('failed','Alas !! Error occured, try again.');
                return Redirect::to('manageSlider');
            }
    	}
    }

    // function for delete slider
    public function deleteSlider($id)
    {
        $imageQuery = DB::table('tbl_slider')
                        ->where('id',$id)
                        ->first();

        $imageName  = $imageQuery->slider_image;
        unlink('public/images/slider/' . $imageName );

        $query = DB::table('tbl_slider')
                        ->where('id',$id)
                        ->delete();
        if($query){
            Session::put('success','Congratulations, Slider sucessfully deleted!!');
            return Redirect::to('manageSlider');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('manageSlider');
        }
    }



} // end of slider controller
