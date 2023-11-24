<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaidItem extends Model
{
    protected $table = 'paid_item';
    protected $fillable = [
        'id',
        'user_id',
        'shop_id',
        'count',
        'postponed',
        'created_at',
        'updated_at',
    ];
}
