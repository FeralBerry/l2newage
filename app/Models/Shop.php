<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shop';
    protected $fillable = [
        'id',
        'title',
        'item_id',
        'price',
        'img',
        'created_at',
        'updated_at',
    ];
}
