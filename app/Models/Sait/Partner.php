<?php

namespace App\Models\Sait;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';
    protected $fillable = [
        'id',
        'kod',
        'created_at',
        'updated_at',
    ];
}
