<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\color_product;
class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'section_id',
        'category_id',
        'fabric',
        'price',
        'discount',
        'description',
        'meta_description',
        'meta_title',
        'meta_keywords',
        'model',
        'sleeve',
        'pattern',
        'video',
        'color',
        'code',
        'status',
        'is_featured',
        'occasion',
        'fit',
    ];
    
   public function section(){
       return $this->belongsToMany(Section::class);
   }

  public function category(){
      return $this->belongsToMany(category::class);
  }
  
  public function image(){
      return $this->morphMany(image::class,"image");
  }
 
  
 public function product_attribute(){
   return $this->hasMany(product_attribute::class);
 }

 public function brand(){
     return $this->belongsToMany(brand::class);
 }

  public function colors()
  {
      return $this->belongsToMany(Color::class);
  }

  public function comments()
  {
      return $this->hasMany(comment::class);
  }
}
