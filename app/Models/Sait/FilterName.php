<?php

namespace App\Models\Sait;

use Illuminate\Database\Eloquent\Model;

class FilterName extends Model
{
    protected $table = 'filter_name';
    protected $fillable = [
        'id',
        'name',
        'key_word',
        'created_at',
        'updated_at',
    ];
}
