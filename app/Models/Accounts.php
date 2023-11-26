<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $connection = 'l2flame';
    protected $table = 'accounts';
    protected $fillable = [
        'login',
        'password',
        'email',
        'lastactive',
        'accessLevel',
        'lastIP',
        'lastServer',
        'pclp',
        'hop1',
        'hop2',
        'hop3',
        'hop4',
        'created_time',
    ];
}
