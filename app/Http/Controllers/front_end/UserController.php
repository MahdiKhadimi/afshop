<?php

namespace App\Http\Controllers\front_end;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function open_login_form(){
        return view('front_end\user\login');
    }
    

    public function login(Request $request){
        return $request->all();
    }

    public function open_register_form(){
        return view('front_end.user.register');
    }
 
    public function register(Request $request){
       return $request->all();
    }
}
