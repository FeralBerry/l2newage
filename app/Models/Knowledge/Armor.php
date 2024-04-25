<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class Armor extends Model
{
    protected $connection = 'mysql';
    protected $table = 'knowledge_armor';
    protected $fillable = [
        'id',
        'title',
        'description',

        'created_at',
        'updated_at',
    ];
}
