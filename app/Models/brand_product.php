<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand_product extends Model
{
    use HasFactory;
    protected $table= 'brand_product';
    protected $fillable = [
        'brand_id',
        'product_id'
    ];
}
