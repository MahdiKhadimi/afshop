<?php

namespace App\Http\Controllers\front_end;

use App\Models\cart;
use App\Models\section;
use App\Models\category;
use App\Models\delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        if(Auth::check()){
           $cart_list = cart::with('product')->where('user_id',Auth::user()->id)->get();
           $deliveries = delivery::where('user_id',Auth::user()->id)->get();
        }else{
          return redirect('user/login_form');
        }
        $sections = section::get();
        $category = category::get();
        return view('front_end.cart.checkout',compact('sections','category','cart_list','deliveries'));
     }
    
     public function add(){
      $sections = section::get();
      $category = category::get();
      return view('front_end.cart.add_address',compact('sections','category'));
        
     }
     
     public function store(Request $request){
        $user_id = Auth::user()->id;
         $delivery = new delivery;
         $delivery->user_id = $user_id;
         $delivery->address = $request->address;
         $delivery->city = $request->city;
         $delivery->state = $request->state;
         $delivery->pincode = $request->pincode;
         $delivery->phone = $request->phone;
         $delivery->status=1;
         if($delivery->save()){
            session()->flash('success','The new address has been successfully added!');
         }else{
            session()->flash('error','Sory Try Again!');
         }
         return redirect('/checkout');
     }

     public function edit($id){
      $sections = section::get();
      $category = category::get();
      $delivery = delivery::where('id',$id)->first();
      return view('front_end.cart.edit_address',compact('sections','category','delivery'));        
     }

     public function update(Request $request,$id){
        $result = delivery::where('id',$id)->update([
           'address'=>$request->address,
           'city'=>$request->city,
           'state'=>$request->state,
           'pincode'=>$request->pincode,
           'phone'=>$request->phone,
        ]);
        if($result){
           session()->flash('success','The selected data successfully deleted');
        }else{
           session()->flash('error','Sory Try Again the selected data do not udpated!');
        } 
        return redirect('/checkout');         
     }

     public function delete($id){
          $result =  delivery::where('id',$id)->delete();
          if($result){
             session()->flash('success','The selected data has been successfully deleted');
          }else{
             session()->flash('error','sorry try again! the selected data not delete');
          }
         return redirect()->back();
     }
}

