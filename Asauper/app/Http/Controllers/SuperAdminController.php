<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SuperAdminController extends Controller
{
    public function index(){
    	return view('SuperAdmin.index');
    }
    public function employeePageView(){
    	// getting users for site admin
    	$getUser = DB::table('users')->where('user_type','regular_user')->get();

    	// viewing site admin user in emploee field
    	$siteAdminInfo = DB::table('users')->where('user_type','site_admin')->get();
    	return view('SuperAdmin.employee')->with(['siteAdminInfo'=>$siteAdminInfo,'getUser'=>$getUser]);
    }
    public function viewRegisterInfo(){
    	$userInfo = DB::table('users')->get();
    	return view('SuperAdmin.userInformation',compact('userInfo'));
    }
    public function toRegularUser($id){
    	$query = DB::table('users')->where('id',$id)->update(['user_type'=>'regular_user']);
    	if($query){
    		return "query Updated!";
    	}
    }
    public function toSiteAdmin($id){
    	$query = DB::table('users')->where('id',$id)->update(['user_type'=>'site_admin']);
    	if($query){
    		return "query Updated!";
    	}
    }
    public function toGuestUser($id){
    	$query = DB::table('users')->where('id',$id)->update(['user_type'=>'guest_user']);
    	if($query){
    		return "query Updated!";
    	}
    }
    public function settingsView(){
    	return view('SuperAdmin.settings');
    }
   
}
