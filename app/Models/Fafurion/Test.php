<?php

namespace App\Models\Fafurion;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $connection = 'mysql3';
    protected $table = 'test';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];
}
