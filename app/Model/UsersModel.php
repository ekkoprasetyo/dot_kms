<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = "t_kms_users";
    protected $primaryKey = 'c_users_id';
    protected $hidden = ['c_users_password'];
    protected $fillable = [
        'c_users_nip',
        'c_users_fullname',
        'c_users_email',
        'c_users_password',
        'c_users_position',
        'c_users_role',
        'c_users_status',
        'c_users_update_by',
        'c_users_update_time',
        'c_users_softdelete',
    ];
    public $timestamps = false;

    public static function loginCred($cred){
        $field_dred = filter_var($cred, FILTER_VALIDATE_EMAIL) ? 'email' : 'nip';

        if ($field_dred == 'email') {
            return UsersModel::where('c_users_email', $cred)
                ->leftJoin('t_kms_role', 't_kms_users.c_users_role', '=', 't_kms_role.c_role_id' )
                ->first();
        }
        else if ($field_dred == 'nip') {
            return UsersModel::where('c_users_nip', $cred)
                ->leftJoin('t_kms_role', 't_kms_users.c_users_role', '=', 't_kms_role.c_role_id' )
                ->first();
        }
    }

    public static function datatables(){
        return UsersModel::select('*')
            ->leftJoin('t_kms_role', 't_kms_users.c_users_role', '=', 't_kms_role.c_role_id' )
            ->where('c_users_softdelete', 0)
            ->get();
    }

    public static function getUsedPosition(){
        return UsersModel::select('c_users_position','c_users_fullname','c_users_nip')
            ->get();
    }

    public static function detailUser($username){
        return UsersModel::where('c_users_id', $username)
            ->leftJoin('t_kms_role', 't_kms_users.c_users_role', '=', 't_kms_role.c_role_id' )
            ->first();
    }

}
