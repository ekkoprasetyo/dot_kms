<?php

namespace App\Model;

use App\Helpers\UserAuthorization;
use Illuminate\Database\Eloquent\Model;
use DB;

class ChatModel extends Model
{
    protected $table = "t_kms_chat";
    protected $primaryKey = 'c_chat_id';
    protected $fillable = [
        'c_chat_to',
        'c_chat_from',
        'c_chat_chat',
        'c_chat_datetime',
    ];
    public $timestamps = false;

    public static function recentChat() {
        return ChatModel::where('c_chat_from',UserAuthorization::getUserID())
            ->Orwhere('c_chat_to',UserAuthorization::getUserID())
            ->select('*', 'u1.c_users_fullname as from','u1.c_users_id as id_from','u2.c_users_fullname as to','u2.c_users_id as id_to')
            ->leftJoin('t_kms_users as u1', 't_kms_chat.c_chat_from', '=', 'u1.c_users_id' )
            ->leftJoin('t_kms_users as u2', 't_kms_chat.c_chat_to', '=', 'u2.c_users_id' )
            ->limit(10)
            ->groupBy('t_kms_chat.c_chat_to')
            ->get();
    }

    public static function directChat($to) {
        return ChatModel::where('c_chat_from',UserAuthorization::getUserID())
            ->orWhere('c_chat_to',UserAuthorization::getUserID())
            ->orWhere('c_chat_from',$to)
            ->orWhere('c_chat_to',$to)
            ->select('*', 'u1.c_users_fullname as from','u1.c_users_id as id_from','u2.c_users_fullname as to','u2.c_users_id as id_to')
            ->leftJoin('t_kms_users as u1', 't_kms_chat.c_chat_from', '=', 'u1.c_users_id' )
            ->leftJoin('t_kms_users as u2', 't_kms_chat.c_chat_to', '=', 'u2.c_users_id' )
            ->orderBy('c_chat_datetime', 'ASC')
            ->get();
    }

}
