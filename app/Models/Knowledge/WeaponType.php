<?php

namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class WeaponType extends Model
{
    protected $connection = 'mysql';
    protected $table = 'knowledge_items';
    protected $fillable = [
        'id',
        'title',
        'created_at',
        'updated_at',
    ];
}
