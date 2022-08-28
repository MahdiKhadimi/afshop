<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    public function product()
    {   
        return $this->belongsTo(product::class);
    }
   
   public static function image_product($id){
       $product = Image::select('picture')->where('image_id',$id)->first();
       if($product){
       return $product['picture'];
       }

   }

 public static function product_price($id){
   $product =  product_attribute::select('price')->where(['product_id'=>$id,])->first();
   if($product){
    return $product['price'];
   }else{
       return 0;
   }
}

public static function product_currency($id){
   $product =  product_attribute::select('price_unit')->where(['product_id'=>$id,])->first();
   if($product){
    return $product['price_unit'];
   }else{
       return "AFG";
   }
}

public static function total_price($quantity,$price){
  $total_price = ceil($price*$quantity);
  return $total_price;
}


}

