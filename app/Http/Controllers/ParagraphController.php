<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;

class ParagraphController extends Controller
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

    #------------------- Add Paragraph --------------------#
    public function addParagraph()
    {
    	return view('paragraph.addParagraph');
    }

    #------------------- Insert Paragraph Info -------------------#
    public function addParagraphInfo(Request $request)
    {
    	$this->validate($request,[
    		'paragraph'	      => 'required',
            'how_times'       => 'required',
    		'paragraphTitle'  => 'required'
    	]);

    	$paragraph 	    = trim($request->paragraph);
        $how_times      = trim($request->how_times);
    	$paragraphTitle = trim($request->paragraphTitle);
    	$word 		    = str_word_count($paragraph);

    	$data 					    = array();
    	$data['paragraph']		    = $paragraph ;
        $data['how_times']          = $how_times ;
    	$data['paragraph_title']	= $paragraphTitle ;
    	$data['word']			    = $word ;
    	$data['status']			    = 2 ;
    	$data['created_at']		    = $this->rcdate;
    	$data['updated_at']		    = $this->rcdate;

    	$query = DB::table('tbl_paragraph')->insert($data);

    	if($query){
            Session::put('success','Congratulations, Paragraph added sucessfully !!');
            return Redirect::to('addParagraph');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('addParagraph');
        }
    }


    #------------------- Manage Paragraph -------------------#
    public function manageParagraph()
    {
    	$result = DB::table('tbl_paragraph')->get();

    	return view('paragraph.manageParagraph')->with('result',$result);
    }

    #------------------- Edit Paragraph ---------------------#
    public function editParagraph($id)
    {
    	$step = DB::table('tbl_step')->get();

    	$value = DB::table('tbl_paragraph')->where('id',$id)->first();

    	return view('paragraph.editParagraph')->with('value',$value)->with('step',$step);
    }

    #------------------------- Update Paragraph -----------------#
    public function updateParagraphInfo(Request $request)
    {
    	$this->validate($request,[
    		'paragraph'	      => 'required',
            'how_times'       => 'required',
            'paragraphTitle'  => 'required'
    	]);

    	$paragraph 		= trim($request->paragraph);
        $how_times      = trim($request->how_times);
        $paragraphTitle = trim($request->paragraphTitle);
    	$status 		= trim($request->status);
    	$primary_id 	= trim($request->primary_id);
    	$word 			= str_word_count($paragraph);

    	$data 					 = array();
    	$data['paragraph']		 = $paragraph ;
    	$data['how_times']		 = $how_times ;
        $data['paragraph_title'] = $paragraphTitle ;
    	$data['word']			 = $word ;
    	$data['updated_at']		 = $this->rcdate;
    	$query = DB::table('tbl_paragraph')->where('id',$primary_id)->update($data);

    	if($query){
            Session::put('success','Congratulations, Paragraph Updated sucessfully !!');
            return Redirect::to('editParagraph/'.$primary_id);
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('editParagraph/'.$primary_id);
        }
    }

    // function for active paragraph
    public function activeParagraph($id)
    {
        $activeParagraphCheck = DB::table('tbl_paragraph')->where('status',1)->count();
        if ($activeParagraphCheck > 0) {
            Session::put('failed','Sorry !! A Paragraph already Active, Please deactive first.');
            return Redirect::to('manageParagraph');
            exit();
        }
        $data = array();
        $data['status'] = '1';
        $query = DB::table('tbl_paragraph')->where('id',$id)->update($data);
        if($query){
            Session::put('success','Congratulations, Paragraph Deactive sucessfully !!');
            return Redirect::to('manageParagraph');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('manageParagraph');
        }

    }

    // function for deactive paragraph
    public function deactiveParagraph($id)
    {
        $data = array();
        $data['status'] = '2';
        $query = DB::table('tbl_paragraph')->where('id',$id)->update($data);
        if($query){
            Session::put('success','Congratulations, Paragraph Deactive sucessfully !!');
            return Redirect::to('manageParagraph');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('manageParagraph');
        }
    }

}
