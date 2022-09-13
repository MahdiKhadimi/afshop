<?php

namespace App\Http\Controllers\front_end;

use App\Models\cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request){
     
        $request->validate([
            'address'=>'required',
            'payment_method'=>'required'
        ],[
            'address.required'=>'please select address',
            'payment_method.required'=>'please select the payment method'
        ]);
        
        if(Auth::check()){
            $products = cart::where('user_id',Auth::user()->id)->get();
         }else{
            $products = cart::where('session_id',Session()->get('session_id'))->get();
         }
        
       return $products;


    }
}
