<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $fillable = [
        'id',
        'user_id',
        'room_id',
        'message',
        'created_at',
        'updated_at',
    ];
}
