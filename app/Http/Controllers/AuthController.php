<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function login(){
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1){
            return redirect()->route('admin.dashboard');

        }
        return view('admin.auth.login');
    }

    public function submit(Request $request){
        $remember = !empty($request->remember) ? true : false;
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 0, 'is_delete' => 0], $remember)){

            return redirect()->route('admin.dashboard');

        }else{
            return redirect()->back()->with("error", "Please enter correct credentials");
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
