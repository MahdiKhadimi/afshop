<?php

namespace App\Http\Controllers\front_end;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comment;

class CommentController extends Controller
{
    function store(Request $request)
    {
        
        $comment = new comment();
        $comment->product_id= $request->product_id;
        $comment->name= $request->name;
        $comment->email= $request->email;
        $comment->review= $request->review;
        if($comment->save()){
         session()->flash('success','Your comments successfully add!');
         }else{
             session()->flash('error','Sorry Try again!');
         }

        return redirect()->back();
    
  }
}
