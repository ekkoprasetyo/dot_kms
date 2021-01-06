<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolePermissionModel extends Model
{
    protected $table = "t_kms_role_permission";
    protected $primaryKey = 'c_role_id';
    protected $fillable = [
        'c_role_id',
        'c_permission_id',
    ];
    public $timestamps = false;
    public $incrementing = false;

    public static function getPermission($role_id){
        return RolePermissionModel::select('c_permission_id')
            ->where('c_role_id', $role_id)
            ->get();
    }
}
