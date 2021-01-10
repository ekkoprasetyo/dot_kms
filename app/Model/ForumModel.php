<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;

class ForumModel extends Model
{
    protected $table = "t_kms_forum";
    protected $primaryKey = 'c_forum_id';
    protected $fillable = [
        'c_forum_issue',
        'c_forum_tags',
        'c_forum_status',
        'c_forum_update_by',
        'c_forum_update_time',
        'c_forum_softdelete',
    ];
    public $timestamps = false;

    public static function detail($id) {
        return ForumModel::where('c_forum_id', $id)
            ->select('*',DB::raw('count(c_comment_forum) as comments_count'))
            ->leftJoin('t_kms_comment', 't_kms_forum.c_forum_id', '=', 't_kms_comment.c_comment_forum' )
            ->leftJoin('t_kms_users', 't_kms_forum.c_forum_update_by', '=', 't_kms_users.c_users_id' )
            ->first();
    }


    public static function open() {
        return ForumModel::where('c_forum_status', 1)->where('c_forum_softdelete', 0)
            ->select('*',DB::raw('count(c_comment_forum) as comments_count'))
            ->leftJoin('t_kms_comment', 't_kms_forum.c_forum_id', '=', 't_kms_comment.c_comment_forum' )
            ->leftJoin('t_kms_users', 't_kms_forum.c_forum_update_by', '=', 't_kms_users.c_users_id' )
            ->orderBy('c_forum_update_time', 'DESC' )
            ->groupBy('c_forum_id')
            ->get();
    }

    public static function close() {
        return ForumModel::where('c_forum_status', 2)->where('c_forum_softdelete', 0)
            ->select('*',DB::raw('count(c_comment_forum) as comments_count'))
            ->leftJoin('t_kms_comment', 't_kms_forum.c_forum_id', '=', 't_kms_comment.c_comment_forum' )
            ->leftJoin('t_kms_users', 't_kms_forum.c_forum_update_by', '=', 't_kms_users.c_users_id' )
            ->orderBy('c_forum_update_time', 'DESC' )
            ->groupBy('c_forum_id')
            ->get();
    }

}
