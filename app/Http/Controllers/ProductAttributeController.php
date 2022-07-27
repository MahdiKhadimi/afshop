<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_attribute;
class ProductAttributeController extends Controller
{
    //
    
   public function store(Request $request){
       $data = $request->all();
      
      return $data;
      exit;
      for($i=0;$i<count($data['size']);$i++){
        $product_attribute = new product_attribute();
         $product_attribute->product_id = $data['product_id'];
         $product_attribute->size = $data['size'][$i];
         $product_attribute->price = $data['price'][$i];
         $product_attribute->price_unit = $data['price_unit'][$i];
         $product_attribute->save();
        
        }   

        
          return redirect('/product')->with('success','product attribute has been succefully added!');
        }

   
  }





