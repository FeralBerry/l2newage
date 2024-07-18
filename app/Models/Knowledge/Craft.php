<?php
namespace App\Models\Knowledge;

use Illuminate\Database\Eloquent\Model;

class Craft extends Model
{
    protected $connection = 'mysql';
    protected $table = 'craft';
    protected $fillable = [
        'id',
        'production_item_id',
        'need_item_id',
        'count',
        'created_at',
        'updated_at',
    ];
}
