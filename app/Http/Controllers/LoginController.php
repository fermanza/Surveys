<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    public function getLogin()
    {
        return view('auth.login');
    }
    
    public function authenticate(Request $request)
    {
        //dd($request);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
           
            if(Auth::user()->role==10)
            {
                return redirect()->intended('/admin');
            }else{
                return redirect()->intended('/my_account');
            }
            
        }
    }

}
