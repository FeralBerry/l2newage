<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'id',
        'user_id',
        'shop_id',
        'count',
        'created_at',
        'updated_at',
    ];
}
