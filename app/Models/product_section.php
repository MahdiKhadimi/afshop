<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product_section extends Pivot
{
    use HasFactory;
    protected $table = 'product_section';
    public $incrementing = true;
    
    protected $fillable = [
        'product_id',
        'section_id'
    ];

   

}
