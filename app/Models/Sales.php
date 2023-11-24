<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $fillable = [
        'id',
        'item_id',
        'percent',
        'created_at',
        'updated_at',
    ];
}
