<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = "t_arms_role";
    protected $primaryKey = 'c_role_id';
    protected $fillable = [
        'c_role_name',
        'c_role_display',
        'c_role_description',
        'c_role_update_by',
        'c_role_update_time',
        'c_role_softdelete',
    ];
    public $timestamps = false;

    public static function datatables(){
        return RoleModel::where('c_role_softdelete', 0)
            ->orderby('c_role_id', 'DESC')
            ->get();
    }

    public static function dropdown(){
        return RoleModel::select('c_role_id',
            'c_role_name',
            'c_role_display')
            ->get();
    }

}
