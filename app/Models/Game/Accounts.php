<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function getCount(): int {
        return DB::connection("l2flame")
            ->table("accounts")
            ->count();
    }
}
