<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\section;
class SectionController extends Controller
{
    public function index(){
        $sections = Section::all();
        return view('section.list',compact('sections'));
    }
   public function create(){
       return view('section.add');
   }


// edit section 
 public function edit($id){
      $section = Section::where('id',$id)->first();
      return view('section.edit',compact('section'));
 }

  //update section
   public function update(Request $request,$id){
    
       $section = Section::find($id);
       $section->name= $request->name;
       $section->status= $request->status;

       if($section->save()){
           session()->flash('success','ٍSelected data has been successfully updated');
       }
       return redirect('section');
       
       
   }

   //store section info in the database
   public function store(Request $request){
       $section = new Section();
       $section->name = $request->name;
       $section->status = $request->status;
       if($section->save()){
        session()->flash('success','New section has been add successfully'); 

       }else{
        session()->flash('error','Try again? New section has Not been add successfully');
       }
       return redirect()->back();
       
   }

   // update section status
   public function updateStatus(Request $request,$id){
      
          $data = $request->all();
          return response()->json($id);
     


   }

   // delete section
   public function delete($id){
       $result = Section::where('id',$id)->delete();
      if($result){
          session()->flash('success','Selected data has been successfully deleted');
      }else{
        session->flash('success','Try again Selected data has Not been successfully deleted');
          
      }
      return redirect()->back();
   }

}

