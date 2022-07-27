<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slide_show extends Model
{
    use HasFactory;

    protected $table = 'slide_shows';
    protected $fillable = [
        'title',
        'text',
        'image'
    ];
}
