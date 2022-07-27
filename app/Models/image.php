<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $fillable = [
        'picture',
        'created_at',
        'updated_at'
    ];
      
    public function image(){
        return $this->morphTo();
    }

}
