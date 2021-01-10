<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model
{
    protected $table = "t_kms_position";
    protected $primaryKey = 'c_position_id';
    protected $fillable = [
        'c_position_abbr',
        'c_position_name',
        'c_position_branch',
        'c_position_update_by',
        'c_position_update_time',
        'c_position_softdelete',
    ];
    public $timestamps = false;

    public static function datatables(){
        return PositionModel::where('c_position_softdelete', 0)
            ->leftJoin('t_kms_branch', 't_kms_position.c_position_branch', '=', 't_kms_branch.c_branch_id')
            ->orderby('c_position_abbr', 'ASC')
            ->get();
    }

    public static function dropdown(){
        return PositionModel::select('c_position_id','c_position_abbr','c_position_name')
            ->where('c_position_softdelete', 0)
            ->orderby('c_position_abbr', 'ASC')
            ->get();
    }

}
