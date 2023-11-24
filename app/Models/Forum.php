<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $fillable = [
        'id',
        'title',
        'description',
        'user_id',
        'tag_name_id',
        'created_at',
        'updated_at',
    ];
}
