<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function getCount() : int {
        return DB::table("item")
            ->count();
    }
}
