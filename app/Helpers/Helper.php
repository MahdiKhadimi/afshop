<?php

use Illuminate\Support\Facades\DB;

function total_item_in_cart(){
    if(Auth::check()){
        $user_id = Auth::user()->id;
        $total_item = DB::table('carts')->where('user_id',$user_id)->sum('quantity');
    }else{
        $session_id = Session::get('session_id');
        $total_item = DB::table('carts')->where('session_id',$session_id)->sum('quantity');   
    }
    return $total_item;
}

