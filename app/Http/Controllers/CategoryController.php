<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\section;
use App\Models\image;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
   
    public function index()
    {   
        // getting categories with their sections
        $categories = category::with('sections','image')->paginate(6);
     
        $sections= section::all();
        return view('category.list')->with(['sections'=>$sections,'categories'=>$categories]);
    }


    public function create()
    {
        $sections = Section::all();
        return view('category.add',compact('sections'));
    }

  
    public function store(StorecategoryRequest $request)
    {    
        
        // insert image to the disk 
        
         // insert data to the database
         $category = new Category();
         $category->name= $request->name;
         $category->meta_title= $request->meta_title;
         $category->meta_keywords= $request->meta_keywords;
         $category->meta_description= $request->meta_description;
         $category->status= $request->status;
         $category->description= $request->description;
         $category->url= $request->url;
         $category->discount= $request->discount;
        
         if($category->save()){
             session()->flash('success','New category has been add successfully');
         // insert data to the category_sections table for many_to_many relationship
             $category_id =Category::max('id');
             foreach ($request->section_id as  $section) {
             $section = DB::table('category_sections')->insert([    
                  'section_id'=>$section,
                   'category_id'=>$category_id,
                 
            ]);
        }  
        // insert multiple image to database
        $files=$request->file('image');
        if(!empty($files)){
           foreach($files as $newfile){
             $file = time().$newfile->getClientOriginalName();
             $image = $newfile->move('images/categories',$file);
             DB::table('images')->insert([
                'picture'=>$image,
                'image_id'=>$category_id,
                'image_type'=>'App\Models\category'

            ]);

           }
        }      
         }
          
        return redirect('category');

    }

    
    public function show(category $id)
    {
        //
    }

    
    public function edit($id)
    {
       
       
        $category = Category::with('sections','image')->findOrFail($id);
         $sections = Section::all();
        
      
         return view('category.edit',compact('category','sections'));
    }

  public function update(UpdatecategoryRequest $request, $id)
    {
        // remove % from the discount  
        $discount= explode('%',$request->discount);
            
           $category = Category::findOrFail($id);
           $oldPicture = image::where('image_id',$id)
           ->where('image_type','App\Models\category')
           ->first();
          
        // update and insert image to the disk 
       if($request->file('image')){
            $file = time().$request->file('image')->getClientOriginalName();
            // $image = $request-file('image')->move('images/categories',$file);
            $saveImage = $request->file('image')->move('images/categories',$file);
           if(!empty($category->image)){ 
            foreach ($category->image as  $item) {
                 unlink($item->picture);
           }
         }
        
        }elseif($oldPicture){
            $saveImage= $oldPicture->picture;
        }else{
            $saveImage = Null;
        }
        // update and insert data to the database
        
        $category->name= $request->name;
        $category->meta_title= $request->meta_title;
        $category->meta_keywords= $request->meta_keywords;
        $category->meta_description= $request->meta_description;
        $category->status= $request->status;
        $category->description= $request->description;
        $category->url= $request->url;
        $category->discount= $discount[0];
       
        if($category->save()){
            session()->flash('success','Selected category has been update successfully');
        // update and insert data to the category_sections table for many_to_many relationship
          
       if($request->has('section_id')){
            DB::table('category_sections')
            ->where('category_id',$id)
            ->delete();
            foreach ($request->section_id as  $section) {
            $section = DB::table('category_sections')
                ->insert([    
                 'section_id'=>$section,
                 'category_id'=>$id,
             ]);

        }
    }   

    if($request->has('image')){
 
       if(empty($category->image)){  
        $image = DB::table('images')
        ->where([
            'image_id'=>$id,
            'image_type'=>'App\Models\category',
        ])
       ->update([
        'picture'=>$saveImage  
       ]);
       }else{
        DB::table('images')->insert([
            'image_id'=>$id,
            'image_type'=>'App\Models\category',
            'picture'=>$saveImage
        ]);
    } 

    }  
    
    // update  related data in image table or insert new data          
        
     }

    
       return redirect('category');
}

   
    public function delete($id)
    {  
       
        // delete specific category 
         DB::table('category_sections')
        ->where('category_id',$id)
        ->delete();
      
       
        $image = image::where('image_id',$id)->first();
        if(!empty($image->picture)){
            unlink($image->picture);
            $image->delete();
        }
       
        $result =  Category::find($id)->delete(); 
        if($result){
            session()->flash('success','Selected Data has been successfully deleted');

        }
      return redirect('category');
    }

    public function deleteImage($id){
       $image = Image::where('id',$id)->first();
       $path = "images\categories";
        if(!empty($image)){
         unlink($image->picture);
          $result= image::where('id',$id)->delete();
          if($result){
              return redirect()->back()->with('success','image has been successfully deleted');
          }
         
        }else{
            
        }

    }
}
