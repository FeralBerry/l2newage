<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Items extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'id',
        'name',
        'type',
        'is_quest',
        'is_drop',
        'is_trade',
        'description',
        'craft_at',
        'created_at',
        'updated_at',
    ];

}
