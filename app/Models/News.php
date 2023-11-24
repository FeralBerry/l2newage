<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'id',
        'name',
        'description',
        'img',
        'tag_id',
        'created_at',
        'updated_at',
    ];
}
