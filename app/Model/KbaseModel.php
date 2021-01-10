<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KbaseModel extends Model
{
    protected $table = "t_kms_kbase";
    protected $primaryKey = 'c_kbase_id';
    protected $fillable = [
        'c_kbase_tags',
        'c_kbase_title',
        'c_kbase_content',
        'c_kbase_update_by',
        'c_kbase_update_time',
        'c_kbase_softdelete',
    ];
    public $timestamps = false;

    public static function datatables(){
        return KbaseModel::where('c_kbase_softdelete', 0)
            ->leftJoin('t_kms_users', 't_kms_kbase.c_kbase_update_by', '=', 't_kms_users.c_users_id' )
            ->orderby('c_kbase_update_time', 'DESC')
            ->get();
    }

    public static function detailKbase($id){
        return KbaseModel::where('c_kbase_id', $id)
            ->leftJoin('t_kms_users', 't_kms_kbase.c_kbase_update_by', '=', 't_kms_users.c_users_id' )
            ->first();
    }
}
