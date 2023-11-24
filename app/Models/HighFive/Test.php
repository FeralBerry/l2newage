<?php

namespace App\Models\HighFive;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'test';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];
}
