<?php

namespace App\Http\Controllers\front_end;

use App\Models\cart;
use App\Models\order;
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
 
        // getting data from carts table
       $carts = cart::where('user_id',Auth::user()->id)->get();
       $result = "";     
       foreach($carts as $cart){

           $result = order::create([
               'user_id'=>Auth::user()->id,
               'product_id'=>$cart->product_id,
               'size'=>$cart->size,
               'color'=>$cart->color,
               'quantity'=>$cart->quantity,
               'delivery_id'=>$request->address,
               'payment_method'=>$request->payment_method
           ]);
       }
        if($result){
          cart::where([
              'user_id'=>Auth::user()->id,
              ])
              ->delete();
           session()->flash('success','Thank you you will son reveice your orders!');
           return redirect('/');
        }else{
        session()->flash('error','Sorry try again! check your cart once more');
        return redirect()->back();
       }

    }
}
