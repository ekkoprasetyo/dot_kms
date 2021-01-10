<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class RewardModel extends Model
{
    protected $table = "t_kms_reward";
    protected $primaryKey = 'c_reward_id';
    protected $fillable = [
        'c_reward_forum',
        'c_reward_point',
        'c_reward_receiver',
        'c_reward_update_by',
        'c_reward_update_time',
        'c_reward_softdelete',
    ];
    public $timestamps = false;

    public static function datatables(){
        return RewardModel::where('c_reward_softdelete', 0)
            ->select('*', 'u1.c_users_fullname as user_receiver','u2.c_users_fullname as user_giver')
            ->leftJoin('t_kms_forum', 't_kms_reward.c_reward_forum', '=', 't_kms_forum.c_forum_id' )
            ->leftJoin('t_kms_users as u1', 't_kms_reward.c_reward_receiver', '=', 'u1.c_users_id' )
            ->leftJoin('t_kms_users as u2', 't_kms_reward.c_reward_update_by', '=', 'u2.c_users_id' )
            ->orderby('c_reward_update_time', 'DESC')
            ->get();
    }

    public static function topPoint(){
        return RewardModel::where('c_reward_softdelete', 0)
            ->select('*', 'u1.c_users_fullname as user_receiver',DB::raw('sum(c_reward_point) as reward_point'))
            ->leftJoin('t_kms_forum', 't_kms_reward.c_reward_forum', '=', 't_kms_forum.c_forum_id' )
            ->leftJoin('t_kms_users as u1', 't_kms_reward.c_reward_receiver', '=', 'u1.c_users_id' )
            ->groupBy('c_reward_receiver')
            ->limit(10)
            ->get();
    }
}


