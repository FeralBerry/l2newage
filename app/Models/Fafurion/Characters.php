<?php

namespace App\Models\Fafurion;

use Illuminate\Database\Eloquent\Model;

class Characters extends Model
{
    protected $connection = 'fafurion';
    protected $table = 'characters';
    protected $fillable = [
        'account_name',
        'charId',
        'char_name',
        'level',
        'maxHp',
        'curHp',
        'maxCp',
        'curCp',
        'maxMp',
        'curMp',
        'face',
        'hairStyle',
        'hairColor',
        'sex',
        'heading',
        'x',
        'y',
        'z',
        'exp',
        'expBeforeDeath',
        'sp',
        'reputation',
        'fame',
        'raidbossPoints',
        'pvpkills',
        'pkkills',
        'clanId',
        'race',
        'classid',
        'base_class',
        'transform_id',
        'deletetime',
        'cancraft',
        'title',
        'title_color',
        'accesslevel',
        'online',
        'onlinetime',
        'char_slot',
        'lastAccess',
        'clan_privs',
        'wantspeace',
        'power_grade',
        'nobless',
        'subpledge',
        'lvl_joined_academy',
        'apprentice',
        'sponsor',
        'clan_join_expiry_time',
        'clan_create_expiry_time',
        'bokmarkslot',
        'vitality_points',
        'createDate',
        'language',
        'faction',
        'pccafe_points',
    ];
}
