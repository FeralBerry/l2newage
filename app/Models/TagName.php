<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagName extends Model
{
    protected $table = 'tag_name';
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];
}
