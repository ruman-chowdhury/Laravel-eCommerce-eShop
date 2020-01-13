<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //show login form
    public function loginForm(){
        return view('admin.pages.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

         //===== here, password will check as bcrypt automatically
         //====== no need to check, bcrypt($request->password)
        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){

            Toastr::success('Succesfully logged in !!','success');
            return redirect()->route('admin.dashboard');

        }else{
            Toastr::error('Credentials not matched !!','error'); //first show error,then redirect
            return redirect()->route('admin.login.form');
        }

    } //end login


    //==============logout===============
    public function logout(){

        Session::flush();
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.form');

    }


}
