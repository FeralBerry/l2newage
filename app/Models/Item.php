<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = [
        'id',
        'name',
        'description',
        'img',
        'item_game_id',
        'price',
        'created_at',
        'updated_at',
    ];
}
