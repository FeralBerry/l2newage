<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $connection = 'mysql';
    protected $table = 'knowledge_race';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];
}
