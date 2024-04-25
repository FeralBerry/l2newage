<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class DropsFromNPC extends Model
{
    protected $connection = 'mysql';
    protected $table = 'knowledge_drops_from_npc';
    protected $fillable = [
        'id',
        'item_id',
        'npc_id',
        'count',
        'created_at',
        'updated_at',
    ];
}
