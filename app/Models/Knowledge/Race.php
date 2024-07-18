<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $connection = 'l2knowledge';
    protected $table = 'race';
    protected $fillable = [
        'id',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

}
