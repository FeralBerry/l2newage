<?php

namespace App\Models\Fafurion;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $connection = 'fafurion';
    protected $table = 'accounts';
    protected $fillable = [
        'id',
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
        'updated_at',
    ];
}
