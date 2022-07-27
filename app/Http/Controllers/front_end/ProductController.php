<?php

namespace App\Http\Controllers\front_end;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\product_section;
use App\Models\section;
use App\Models\brand;
class ProductController extends Controller
{
    

    public function product_detail($id){
        
        $sections = Section::with('categories')->where('status',1)->orderBy('id','desc')->get();
        $brands = Brand::orderBy('id','desc')->where('status',1)->get();
        $product_detail = Product::with('image','category','section','brand','product_attribute',
        'colors','comments')
         ->find($id);
        
   
 
        return view('front_end\product_detail\product_item',compact('product_detail','brands','sections'));
      

    }


  public function product_list($section){
      
    
    $product_list = Product::with('section','category','brand','colors','image','product_attribute')
                    ->get();
    $sections = section::get();
    $brands = brand::get();
    return view('front_end\category\product_list',compact('product_list','sections','brands'));  
  
  }


}
