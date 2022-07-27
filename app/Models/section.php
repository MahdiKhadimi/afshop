<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;

    // relationship between section and category
    // this relationship is many to many
   public function categories(){
       return $this->belongsToMany(category::class,'category_sections');
   }
   

   // relationship between section and product  
   public function product(){
       return $this->belongsToMany(product::class,'product_section');
   }

 
   
}
