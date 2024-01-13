<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request){
        $input = $request->all(); 
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            if(auth()->user()->is_admin ==1){
                return redirect()->route('adminhome');
            }else{
                return redirect()->route('userhome');
            }
        }else{
            return redirect()->route('login')->with('error','Input proper email or password.');
        }
    }

}

