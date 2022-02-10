<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admins.login');
    }

    public function dashboard(){
        return view('admins.dashboard');
    }

    public function login(Request $request){
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'],'password'=>$check['password']])){

            return redirect()->route('admin.dashboard')->with('error','Login Successfully');
        }else{
            return back();
        }
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('login_from');
    }
}
