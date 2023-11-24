<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumPosts extends Model
{
    protected $table = 'forum_posts';
    protected $fillable = [
        'id',
        'description',
        'forum_id',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
