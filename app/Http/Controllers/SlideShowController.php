<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slide_show;

class SlideShowController extends Controller
{
   
    public function index()
    {
        $slide_shows = slide_show::get();
        return view('slide_show.list',compact('slide_shows'));

    }

    
    public function create()
    {
        return view('slide_show.add');
    }

   
    public function store(Request $request)
    {
       
        if($request->file('image')){
            $path = "images\slide_shows";
            $file = time().$request->file("image")->getClientOriginalName();
            $image= $request->file('image')->move($path,$file);
        }

       $result =  slide_show::create([
            'title'=>$request->title,
            'text'=>$request->text,
            'image'=>$image,
         ]);
       if($result){
           session()->flash('success','new slide show added successfully!');
       }
       return redirect('slide_show');
    }

    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $slide_show = slide_show::find($id);
        return view('slide_show.edit',compact('slide_show'));
    }

   
    public function update(Request $request, $id)
    {
        $slide_show = slide_show::find($id);
        
        // delete image if exist 
        if($request->file('image')){
            $path = "images\slide_shows";
            $file = time().$request->file("image")->getClientOriginalName();
            $image= $request->file('image')->move($path,$file);

            if($slide_show['image']){
                unlink($slide_show->image);
            }
        }else{
            $image = $slide_show['image'];
        }
        // update slide slide show 
       $result =  $slide_show->update([
            'title'=>$request->title,
            'text'=>$request->text,
            'image'=>$image,
        ]);
        

        if($result){
            session()->flash('success','successfully updated!');
        }
        return redirect('slide_show');
    }

   
    public function delete($id)
    {
        $slide_show = slide_show::find($id);
        if($slide_show->image){
            unlink($slide_show->image);
        }
        $result = $slide_show->delete();
        if($result){
            session()->flash('success','Successfully Deleted');
        }
        return redirect('/slide_show');
    }
}
