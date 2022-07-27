<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use App\Models\product_section;
use App\Models\category_product;
use App\Models\brand;
use App\Models\Color;
use App\Models\brand_product;
use Image as images;
class ProductController extends Controller
{
    /**
     * Display a listing of the product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $products = Product::with(['section'=>function($query){
              $query->select('id','name');
        },
        'category'=>function($query){
            $query->select('id','name');
        },
        'image',
        'brand',
        'colors',
        'product_attribute'
        ])
        ->get();    
       
        
        return view('product.list',compact('products'));
    } 

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        $brands = brand::where('status',1)->get();
        $colors = Color::get();

        //filter sleeve 
        $sleeves = ['Full Sleeve','Half Sleeve','Short Sleeve','Sleeveles'];
        // filter fabric 
        $fabrics = ['caton','plaster','wool'];

        return view('product.add',
        [
        'categories'=>$categories,
        'sections'=>$sections,
        'sleeves'=>$sleeves,
        'fabrics'=>$fabrics,
        'brands'=>$brands,
        'colors'=>$colors
    ]);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $rules = [
             'name'=>'required',
             'section_id'=>'required',
             'category_id'=>'required'
         ];
         $messages = [
             'name.required'=>"Please Enter the Name",
             'section_id.required'=>"Please Enter the Section",
             'category_id.required'=>'Please Enter the category'
         ];
       $request->validate($rules,$messages);
       
      

         if($request->hasFile('video')){
            $file1 = time().$request->file("video")->getClientOriginalName();
            $path = "videos/products/";
            $video = $request->file('image')->move($path,$file1);
        }else{
            $video = NULl;
        }
       $result = Product::create([
           'name'=>$request->name,
           'discount'=>$request->discount,
           'fabric'=>$request->fabric,
           'model'=>$request->model,
           'description'=>$request->description,
           'meta_title'=>$request->meta_title,
           'meta_description'=>$request->meta_description,
           'meta_keywords'=>$request->meta_keywords,
           'status'=>$request->status,
           'is_featured'=>'yes',
           'fit'=>$request->fit,
           'occasion'=>$request->occasion,
           'sleeve'=>$request->sleeve,
           'code'=>$request->code,
           
           'pattern'=>$request->pattern,
           'video'=>$video,
          
       ]);

    
       if($result){
         session()->flash('success','ٰYou have successfully added new product');
         //getting category id
         $product_id =Product::max('id');
         $section_id= explode("-",$request->section_id);
         $section_id= $section_id[0];
         $category_id=explode("-",$request->category_id);
         $category_id= $category_id[0];
       // insert data into product_section table 
          product_section::create([
              'product_id'=>$product_id,
              'section_id'=>$section_id
          ]);
        // insert data into category_product table 
        category_product::create([
            'product_id'=>$product_id,
            'category_id'=>$category_id,
        ]);
      
        // insert data into brand_product table
        brand_product::create([
            'brand_id'=>$request->brand_id,
            'product_id'=>$product_id
        ]);

        // insert data into color_product table 
        foreach($request->colors as $color){
            DB::table('color_product')->insert([
              'color_id'=>$color,
              'product_id'=>$product_id
            ]);
        }



    // insert data into the image table 
     if($request->file('image')){    
       foreach ($request->file('image') as $image) {
           $file = time().$image->getClientOriginalName();
           $path = 'images/products/';
           $image = $image->move($path,$file);
           DB::table('images')->insert([
            'picture'=>$image,
            'image_type'=>'App\Models\product',
            'image_id'=>$product_id
         ]);
       }     
    }
       }else{
        session()->flash('error','ٰSorry! You have not successfully added new product');

       }
       return redirect('product');
         

    }

  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = product::with('section','category','image')->find($id);
        $sections=section::all();
     
      
       
        $categories = category::all();
        return view('product.edit',compact('product','sections','categories'));
    }

  
    public function update(Request $request, $id)
    {
        
        $product = Product::find($id);
        if($request->file('video')){
           $file1 = time().$request->file("video")->getClientOriginalName();
           $path = "videos/products/";
           $video = $request->file('image')->move($path,$file1);
           unlink($product->video);
       }else{
           $video = $product->video;
       }
      $result = Product::find($id)->update([
          'name'=>$request->name,
          'discount'=>$request->discount,
          'fabric'=>$request->fabric,
          'model'=>$request->model,
          'description'=>$request->description,
          'meta_title'=>$request->meta_title,
          'meta_description'=>$request->meta_description,
          'meta_keywords'=>$request->meta_keywords,
          'status'=>$request->status,
          'is_featured'=>'yes',
          'fit'=>$request->fit,
          'occasion'=>$request->occasion,
          'sleeve'=>$request->sleeve,
          'code'=>$request->code,
          'color'=>$request->color,
          'pattern'=>$request->pattern,
          'video'=>$video,
         
      ]);

   
      if($result){
        session()->flash('success','ٰYou have successfully edited new product');
        //getting category id
        
        $section_id= explode("-",$request->section_id);
        $section_id= $section_id[0];
        $category_id=explode("-",$request->category_id);
        $category_id= $category_id[0];
      // insert data into product_section table 
         product_section::where('product_id',$id)->update([
             'product_id'=>$id,
             'section_id'=>$section_id
         ]);
       // insert data into category_product table 
       category_product::where('product_id',$id)->update([
           'product_id'=>$id,
           'category_id'=>$category_id,
       ]);

    
       
      
         // update data into the image table 
     if($request->file('image')){ 
         $image1 = image::where('image_id',$id)->get();
         foreach($image1 as $image_info){
            try {
            unlink($image_info->picture);      
            } catch (Exception $e) {
               throw $e;
            }   
            
         }   
        foreach ($request->file('image') as $image) {
            $file = time().$image->getClientOriginalName();
            $path = 'images/products/';
            $image = $image->move($path,$file);
            DB::table('images')->where('image_id',$id)->updateOrInsert([
             'picture'=>$image,
             'image_type'=>'App\Models\product',
             'image_id'=>$id
          ]);
        }     
     } 
       }      

      else{
       session()->flash('error','ٰSorry! You have not successfully edited new product');

      }
      return redirect('product');
        
        
    }
   public function delete($id){
       
    $image = Image::Where('image_id',$id)->get();
   
    if(!empty($image)){

        foreach($image as $image_info){
            unlink($image_info->picture);
            $image_info->delete();
        
        }
     
    }
    
     Product::find($id)->delete();
       return redirect()->back()->with('success','Selected Data has been successfully Deleted!');
   }
    
 
}
