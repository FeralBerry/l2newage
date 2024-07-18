<?php

namespace App\Models\Sait;

use Illuminate\Database\Eloquent\Model;

class NewsComments extends Model
{
    protected $table = 'news_comments';
    protected $fillable = [
        'id',
        'user_id',
        'news_id',
        'created_at',
        'updated_at',
        'text',
    ];
}
