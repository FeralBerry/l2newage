<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'user_id',
        'shop_id',
        'count',
        'created_at',
        'updated_at',
    ];
}
