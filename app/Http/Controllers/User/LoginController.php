<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //show login form
    public function loginForm(){
        return view('user.pages.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){

            dd('hello');

        }else{
            Toastr::error('Credentials not matched !!','error'); //first show error,then redirect
            return redirect()->route('admin.login.form');
        }


    }

}
