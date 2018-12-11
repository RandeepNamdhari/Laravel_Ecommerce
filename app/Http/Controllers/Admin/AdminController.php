<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
//use Auth;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    	public function login(){
		if (Auth::guard('admin')->check()) {
		  return redirect('admin/product');
		}else{
			$title = array('pageTitle' => 'Login');
			return view("admin.login",$title);
		}
	}
	
	public function admininfo(){
		$administor = administrators::all();		
		return view("admin.login",$title);
	}
	
	//login function
	public function checkLogin(Request $request){

		$validator = Validator::make(
			array(
					'email'    => $request->email,
					'password' => $request->password
				), 
			array(
					'email'    => 'required | email',
					'password' => 'required',
				)
		);
		//check validation
		if($validator->fails()){
			return redirect('admin/login')->withErrors($validator)->withInput();
		}else{
			//check authentication of email and password
			$adminInfo = array("email" => $request->email, "password" => $request->password);
			
			if(auth()->guard('admin')->attempt($adminInfo)) {
				$admin = auth()->guard('admin')->user();
				$administrators = DB::table('administrators')->where('myid', $admin->myid)->get();	
				return redirect()->intended('admin/product')->with('administrators', $administrators);
			}else{
				return redirect('admin/login')->with('loginError','Incorrect Details');
			}
			
		}
		
	}
	
	
	//logout
	public function logout(){
		Auth::guard('admin')->logout();
		return redirect()->intended('admin/login');
	}
}
