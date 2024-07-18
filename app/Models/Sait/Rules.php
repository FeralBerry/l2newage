<?php

namespace App\Models\Sait;

use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    protected $table = 'rule';
    protected $fillable = [
        'id',
        'description',
        'created_at',
        'updated_at',
    ];
}
