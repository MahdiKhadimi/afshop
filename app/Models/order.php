<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','product_id','delivery_id','payment_method',
    ];

    public function user()
    {
        return $this->hasOne(user::class);
    }

    public function delivery()
    {
        return $this->hasOne(delivery::class);
    }

    public function product()
    {
        return $this->hasOne(product::class);
    }

    public function cart()
    {
        return $this->hasOne(cart::class);
    }
}
