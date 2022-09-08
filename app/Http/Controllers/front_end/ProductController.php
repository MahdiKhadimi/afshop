<?php

namespace App\Http\Controllers\front_end;

use App\Models\cart;
use App\Models\brand;
use App\Models\category;
use App\Models\product;
use App\Models\section;
use Illuminate\Http\Request;
use App\Models\product_section;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
      
     
     //check if product exist in the cart table  don't add it again 
     if(Auth::check()){
      $product_exist = cart::where(['product_id'=>$request->product_id,'user_id'=>Auth::user()->id])
                        ->count();
     }else{
      $product_exist = cart::where(['product_id'=>$request->product_id,'session_id'=>$session_id])
                       ->count();
     }
     if(Auth::check()){
        $user_id = Auth::user()->id;
     }else{
       $user_id = 0;
     }

        // insert product to cart
     if($product_exist<=0){ 
         DB::table('carts')->Insert([
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
      }else{
         DB::table('carts')
            ->where([
               'product_id'=>$request->product_id,
               'session_id'=>$session_id
               ])
            ->Update([
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
      }
      
      return redirect()->back(); 
}

public function show_cart(){
   if(Auth::check()){
      $cart_list = cart::with('product')->where('user_id',Auth::user()->id)->get();
   }else{
      $cart_list = cart::with(['product'])
      ->where('session_id',Session()->get('session_id'))->get();
   }
   $sections = Section::get();
   $category = category::get();
   return view('front_end.cart.shopping_cart',compact('sections','category','cart_list'));
}


public function delete_cart($id){
   $session_id = Session::get('session_id');
   $result =  Cart::where([
      'session_id'=>$session_id,
      'product_id'=>$id
      ])
   ->delete();
   if($result){
    Session::flash('success','successfully deleted product from cart');
   }
   return redirect()->back();
}

public function delete_cart_when_login($id){
   $user_id =Auth::user()->id;
   $result =  Cart::where([
      'user_id'=>$user_id,
      'product_id'=>$id
      ])
   ->delete();
   if($result){
    Session::flash('success','successfully deleted product from cart');
   }
   return redirect()->back();
}



}
