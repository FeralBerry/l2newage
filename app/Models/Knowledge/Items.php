<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $connection = 'mysql';
    protected $table = 'knowledge_items';
    protected $fillable = [
        'id',
        'title',
        'description',
        'craft_at',
        'created_at',
        'updated_at',
    ];
}
