<?php

namespace App\Models\Sait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'id',
        'name',
        'description',
        'img',
        'tag_id',
        'created_at',
        'updated_at',
    ];
    public function getCount() : int
    {
        return DB::table("news")
            ->count();
    }
}
