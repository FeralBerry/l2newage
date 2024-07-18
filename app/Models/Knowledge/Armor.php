<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class Armor extends Model
{
    protected $connection = 'mysql';
    protected $table = 'armor';
    protected $fillable = [
        'id',
        'p_def',
        'm_def',
        'weight',
        'grade',
        'price',
        'created_at',
        'updated_at',
    ];
}
