<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_section extends Model
{
    use HasFactory;
    protected $table = 'product_section';
    protected $fillable = [
        'product_id',
        'section_id'
    ];
}
