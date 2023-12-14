<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class NPC extends Model
{
    protected $connection = 'mysql';
    protected $table = 'knowledge_npc';
    protected $fillable = [
        'id',
        'title',
        'lvl',
        'race_id',
        'isRaid',
        'minions_id',
        'description',
        'loc_img',
        'type_agr',
        'HP',
        'MP',
        'EXP',
        'SP',
        'created_at',
        'updated_at',
    ];
}
