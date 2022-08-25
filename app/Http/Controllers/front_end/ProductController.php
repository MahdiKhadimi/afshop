<?php

namespace App\Http\Controllers\front_end;

use App\Models\cart;
use App\Models\brand;
use App\Models\product;
use App\Models\section;
use Illuminate\Http\Request;
use App\Models\product_section;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


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

  public function product_list($section=null,$category=null)
  {
       
      $show_sort = ['Default','Name(A-Z)','Name(Z-A)'];              
      $product_list = Product::join('category_product','products.id','=','category_product.product_id')
      ->with(['section','category','image','product_attribute','brand','colors','comments'])
      ->where('category_product.category_id','=',$category)
      ->paginate(10);  
    $sections = section::get();
    $brands = brand::get();  
    $old_sort = $show_sort[0];  
    $old_show = 10;  
    return view('front_end\category\product_list',compact('product_list','sections','section','brands','show_sort','category','old_show','old_sort'));  
  
  }

function product_list_with_request(Request $request)
 {
  $show_sort = ['Default','Name(A-Z)','Name(Z-A)'];   
  
  switch($request->sort){
    case 'Default':
       $column = 'name';
       $status = 'asc'; 
       break;
    case 'Name(A-Z)':
       $column = 'name';
       $status = 'asc'; 
       break;
    case 'Name(Z-A)':
       $column = 'name';
       $status = 'desc'; 
       break;                        
    } 
   
    $section = $request->section;
    $category= $request->category;

    $product_list = Product::join('category_product','products.id','=','category_product.product_id')
    ->with('section','category','image','product_attribute','brand','colors','comments')
    ->where('category_product.category_id','=',$category)  
    ->orderBy('products.'.$column,$status)
    ->paginate($request->show)
    ->withPath('product_list/'.$section.'/'.$category);
    
    $sections = section::get();
    $brands = brand::get();    
    $old_sort = $request->sort;
    $old_show = $request->show;
    
    return view('front_end\category\product_list',compact('product_list','sections','section','brands','show_sort','category','old_sort','old_show'));  
 }

public function list_product_with_brand($brand){
   $show_sort = ['Default','Name(A-Z)','Name(Z-A)'];              
   $old_sort = $show_sort[0];  
   $old_show = 10;

   $product_list = Product::join('brand_product','products.id','brand_product.product_id')
   ->with('section','category','image','product_attribute','brand','colors','comments')
    ->where('brand_product.brand_id',$brand)
    ->paginate(10);
     
    $sections = section::get();
    $brands = brand::get();
    
    return view('front_end\category\product_list_brand',compact('product_list','sections','brands'));  
}

public function add_product_to_cart(Request $request){
   date_default_timezone_set('Asia/Kabul');    
   // generate session_id if not exist 
       $session_id = Session::get('session_id');
       if(empty($section_id)){
         $session_id = Session::getId();
         Session::put('session_id',$session_id);
        }     
       $user_id=NULL;
     
     //check if product exist in the cart table  don't add it again 
      $product_exist = cart::where('product_id',$request->product_id)
                       ->count();

        // insert product to cart
         DB::table('carts')->updateOrInsert(['product_id'=>$request->product_id],[
            'product_id'=>$request->product_id,
            'session_id'=>$session_id,
            'user_id'=>$user_id,
            'quantity'=>$request->quantity,
            'size'=>$request->size,
            'color'=>$request->color,
            'created_at'=> now(),
            'updated_at'=>now()
         ]);
        session()->flash('success','product successfully add to the cart table');
    
      return redirect()->back(); 
}







}
