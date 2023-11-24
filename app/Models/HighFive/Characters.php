<?php

namespace App\Models\HighFive;

use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{
    protected $connection = 'highfive';
    protected $table = 'characters';
    protected $fillable = [
        'account_name',
        'obj_id',
        'char_name',
        'face',
        'hairStyle',
        'hairColor',
        'sex',
        'heading',
        'x',
        'y',
        'z',
        'karma',
        'pvpkills',
        'pkkills',
        'clanId',
        'createtime',
        'deletetime',
        'title',
        'rec_have',
        'rec_left',
        'rec_bonus_time',
        'hunt_points',
        'hunt_time',
        'accesslevel',
        'online',
        'onlinetime',
        'lastAccess',
        'leaveclan',
        'deleteclan',
        'nochannel',
        'pledge_type',
        'pledge_rank',
        'lvl_joined_academy',
        'apprentice',
        'key_bindings',
        'pcBangPoints',
        'vitality',
        'fame',
        'level',
        'maxHp',
        'curHp',
        'maxCp',
        'curCp',
        'maxMp',
        'curMp',
        'exp',
        'expBeforeDeath',
        'sp',
        'reputation',
        'bookmarks',
        'balans',
        'bot_report_points',
        'LastHWID',
    ];
}
