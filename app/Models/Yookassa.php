<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yookassa extends Model
{
    protected $table = 'yookassa';
    protected $fillable = [
        'id',
        'user_id',
        'payment_id',
        'status',
        'paid',
        'amount',
        'currency',
        'payment_link',
        'description',
        'paid_at',
        'uniq_id',
        'created_at',
        'updated_at',
    ];
}
