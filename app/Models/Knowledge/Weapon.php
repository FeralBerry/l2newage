<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    protected $connection = 'mysql';
    protected $table = 'knowledge_items';
    protected $fillable = [
        'id',
        'title',
        'description',
        'type_id',
        'atk_speed',
        'p_atk',
        'm_atk',
        'soul_shot_cost',
        'spirit_shot_cost',
        'price',
        'craft_at',
        'need_to_create',
        'created_at',
        'updated_at',
    ];
}
