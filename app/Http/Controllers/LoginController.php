<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login_form');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password]))
        {
            return redirect()->route('dashboard.admin');
        }

        session()->flash('warning','Email or Password not match');
        return redirect()->back()->withInput($request->all());
    }

    public function logout(){
        Auth::logout();
        session()->flash('success','Logged Out');
        return redirect()->route('user.login');
    }
}
