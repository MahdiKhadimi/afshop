<?php

namespace App\Http\Controllers\front_end;
use App\Models\cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function open_login_form(){
        return view('front_end\user\login');
    }
    
    public function open_register_form(){
        return view('front_end.user.register');
    }
 
    public function open_forgot_password_form(){
       return view('front_end\user\forgot_password');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Please insert your email',
            'password.required'=>'please insert your password',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            cart::where('session_id',Session::get('session_id'))
            ->update([
               'user_id'=>Auth::user()->id,
             ]);
            return redirect('/');
        }else{
            session()->flash('error','Incorrect your email or password');
            return redirect()->back();
        }
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'email|required',
            'password'=>'required',
            'phone'=>'required',
            'confirm_password'=>'same:password'
        ],[
            'name.required'=>'Please write your email',
            'email.email'=>'Please Enter a valid email address',
            'password.required'=>'Please insert password',
            'email.required'=>'please insert your email',
            'phone.required'=>'Please inter your phone number',
            'confirm_password.same'=>'do not much your password please try again!'
        ]);

       $number_of_user = User::where('email',$request->email)->count();
       if($number_of_user>0){
           session()->flash('error','The email address already exist!');
           return redirect()->back();
       }else{
           $user = new User;
           $user->name= $request->name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $user->phone = $request->phone;
           $user->save();
           if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
               cart::where('session_id',Session::get('session_id'))
               ->update([
                  'user_id'=>Auth::user()->id,
                ]);
               return redirect('/');
           }
       }   
    }

    public function forgot_password(Request $request){
       
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
   
}
