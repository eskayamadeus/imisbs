<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    
    public function __construct()
    {   
        //protecting against people not logged in as admin
        // prevent middleware from controlling the logout function
        $this->middleware('guest:admin',['except' => ['logout']]);
    }


    public function showLoginForm()
    {
        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
        // validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        
        // attempt to log in
        // specify the admin guard so that it'll reference the admin model
        if(Auth::guard('admin')->attempt(['email'=>$request['email'],'password'=>$request['password']], $request->remember)){
            // if successful, redirect them to intended destination which is dashboard
            return redirect()->intended(route('admin.dashboard'));
        }
            // if unsuccessful, redirect back to login form with their form data
            // we want to only pass the email and the remember but no password
            return redirect()->back()->withInput($request->only('email','remember'));
        //}

          
        //return true;
    }

    // logout the admin. see also login controller file
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
