<?php

namespace App\Http\Controllers\front_end;

use App\Models\brand;
use App\Models\product;
use App\Models\section;
use Illuminate\Http\Request;
use App\Models\product_section;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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


  public function product_list($section,$category,$sort=null,$show=null)
  {
     $show_sort = ['Default','Name(A-Z)','Name(Z-A)','Price(Low_to_High)','Price(High_to_Low)'];   
     
     
    $product_list = Product::with('section','category','image','product_attribute','brand','colors','comments')
    ->limit(3)
    ->get();

    $sections = section::get();
    $brands = brand::get();
    
    
    return $product_list;
    return view('front_end\category\product_list',compact('product_list','sections','brands','show_sort','section','category'));  
  }


}
