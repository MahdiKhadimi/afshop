<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    
    // This accessor make upper case first letter of name 
    public function getNameAttribute($value){
        return ucfirst($value);
    }
    // showing percentage after the discount
    public function getDiscountAttribute($value){
       return $value."%";
    }


    //  relationship between category and section
    // this relationship is many to many
    public function sections(){
        return $this->BelongsToMany(section::class,'category_sections');
    }

    //  Polymorphic relationship between category and and image
    public function image(){
        return $this->morphMany(image::class,'image');
    }
    
    // relationship between category and product
   public function products(){
        return $this->belogsToMany(Product::class);

   }
 

}
