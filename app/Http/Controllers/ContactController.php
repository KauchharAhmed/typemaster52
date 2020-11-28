<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;
use Mail;

class ContactController extends Controller
{
    // basic method
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

    // function for add contact group
    public function addGroup()
    {
    	return view('group.addGroup');
    }

    // function for add group info
    public function addGroupInfo(Request $request)
    {
    	// Validation
        $this->validate($request, [
        'groupName' => 'required'
        ]);

        //Collecting data from html form
        $groupName = trim($request->groupName);

        //Check duplicatet primary category name
        $count = DB::table('tbl_group')
        ->where('group_name', $groupName)
        ->count();

        if($count > 0){
            Session::put('failed','Sorry ! '.$groupName. ' already exits. Try to add new Step');
            return Redirect::to('addGroup');
            exit();
        }

        $data = array();
        $data['group_name']   = $groupName ;
        $data['created_at']  = $this->rcdate;

        $query = DB::table('tbl_group')->insert($data);

        if($query){
            Session::put('success','Congratulations, Group added sucessfully !!');
            return Redirect::to('addGroup');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('addGroup');
        }
    }

    // function for manage step
    public function manageGroup()
    {
        $result = DB::table('tbl_group')->get();
    	return view('group.manageGroup')->with('result',$result);
    }

    #--------------------- Edit Group --------------------#
    public function editGroup($id)
    {
        $value = DB::table('tbl_group')->where('id',$id)->first();

        return view('group.editGroup')->with('value',$value);
    }

    #_--------------------- Update Group --------------------#
    public function updateGroupInfo(Request $request)
    {
        // Validation
        $this->validate($request, [
        'groupName' => 'required'
        ]);

        //Collecting data from html form
        $groupName   = trim($request->groupName);
        $primary_id = trim($request->primary_id);

        //Check duplicatet primary category name
        $count = DB::table('tbl_group')
        ->where('group_name', $groupName)
        ->whereNotIn('id',[$primary_id])
        ->count();

        if($count > 0){
            Session::put('failed','Sorry ! '.$groupName. ' already exits. Try to add new Step');
            return Redirect::to('editGroup/'.$primary_id);
            exit();
        }

        $data = array();
        $data['group_name']   = $groupName ;

        $query = DB::table('tbl_group')->where('id',$primary_id)->update($data);

        if($query){
            Session::put('success','Congratulations, Group Updated sucessfully !!');
            return Redirect::to('editGroup/'.$primary_id);
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('editGroup/'.$primary_id);
        }
    }

    // function for delete group
    public function deleteGroup($id)
    {
        $check = DB::table('tbl_contact')->where('group_id',$id)->count();
        if ($check > 0) {
            Session::put('failed','Sorry !! This Group already used in a Contact. Contact Delete First Then Try it.');
            return Redirect::to('manageGroup');
            exit();
        }
        $query = DB::table('tbl_group')->where('id',$id)->delete();
        if($query){
            Session::put('success','Congratulations, Group Deleted sucessfully !!');
            return Redirect::to('manageGroup');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('manageGroup');
        }
    }

    // function for add contact 
    public function addContact()
    {
    	$group = DB::table('tbl_group')->get();
    	return view('contact.addContact')->with('group',$group);
    }

    // function for add contact info
    public function addContactInfo(Request $request)
    {
    	$this->validate($request,[
    		'group'			=> 'required',
    		'contactName'	=> 'required',
    		'contactMobile'	=> 'required'
    	]);

    	$group 			= trim($request->group);
    	$contactName 	= trim($request->contactName);
    	$contactMobile 	= trim($request->contactMobile);
    	$remarks 		= trim($request->remarks);

    	$count = DB::table('tbl_contact')->where('contact_name',$contactName)->count();
    	if ($count > 0) {
    		Session::put('failed','Sorry !! '.$contactName.' Contact Name already exits, try again.');
            return Redirect::to('addContact');
    	}

    	$count2 = DB::table('tbl_contact')->where('contact_mobile',$contactMobile)->count();
    	if ($count2 > 0) {
    		Session::put('failed','Sorry !! '.$contactMobile.' Contact Mobile already exits, try again.');
            return Redirect::to('addContact');
    	}

    	$data 					= array();
    	$data['group_id']		= $group;
    	$data['contact_name']	= $contactName;
    	$data['contact_mobile']	= $contactMobile;
    	$data['remarks']		= $remarks;
    	$data['created_at']		= $this->rcdate;

    	$query = DB::table('tbl_contact')->insert($data);

    	if($query){
            Session::put('success','Congratulations, Contact added sucessfully !!');
            return Redirect::to('addContact');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('addContact');
        }
    }

    // function for manage contact info
    public function manageContact()
    {
        $result = DB::table('tbl_contact')
                    ->join('tbl_group','tbl_group.id','=','tbl_contact.group_id')
                    ->select('tbl_contact.*','tbl_group.group_name')
                    ->get();
        return view('contact.manageContact')->with('result',$result);
    }

    // function for edit contact info
    public function editContact($id)
    {
        $group = DB::table('tbl_group')->get();
        $row = DB::table('tbl_contact')
                    ->join('tbl_group','tbl_group.id','=','tbl_contact.group_id')
                    ->select('tbl_contact.*','tbl_group.group_name')
                    ->where('tbl_contact.id',$id)
                    ->first();
        return view('contact.editContact')->with('row',$row)->with('group',$group);
    }

    // function for update contact info
    public function updateContactInfo(Request $request)
    {
        $this->validate($request,[
            'group'         => 'required',
            'contactName'   => 'required',
            'contactMobile' => 'required',
            'id'            => 'required'
        ]);

        $group          = trim($request->group);
        $contactName    = trim($request->contactName);
        $contactMobile  = trim($request->contactMobile);
        $remarks        = trim($request->remarks);
        $id             = trim($request->id);

        $count = DB::table('tbl_contact')->where('contact_name',$contactName)->whereNotIn('id',[$id])->count();
        if ($count > 0) {
            Session::put('failed','Sorry !! '.$contactName.' Contact Name already exits, try again.');
            return Redirect::to('editContact/'.$id);
        }

        $count2 = DB::table('tbl_contact')->where('contact_mobile',$contactMobile)->whereNotIn('id',[$id])->count();
        if ($count2 > 0) {
            Session::put('failed','Sorry !! '.$contactMobile.' Contact Mobile already exits, try again.');
            return Redirect::to('editContact/'.$id);
        }

        $data                   = array();
        $data['group_id']       = $group;
        $data['contact_name']   = $contactName;
        $data['contact_mobile'] = $contactMobile;
        $data['remarks']        = $remarks;
        $data['modified_at']    = $this->rcdate;

        $query = DB::table('tbl_contact')->where('id',$id)->update($data);

        if($query){
            Session::put('success','Congratulations, Contact Updated sucessfully !!');
            return Redirect::to('editContact/'.$id);
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('editContact/'.$id);
        }
    }

    // function for delete contact info
    public function deleteContact($id)
    {
        $query = DB::table('tbl_contact')->where('id',$id)->delete();

        if($query){
            Session::put('success','Congratulations, Contact Deleted sucessfully !!');
            return Redirect::to('manageContact');
        }else{
            Session::put('failed','Alas !! Error occured, try again.');
            return Redirect::to('manageContact');
        }

    }

} // end of controller
