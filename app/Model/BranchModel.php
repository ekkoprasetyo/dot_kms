<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BranchModel extends Model
{
    protected $table = "t_kms_branch";
    protected $primaryKey = 'c_branch_id';
    protected $fillable = [
        'c_branch_code',
        'c_branch_name',
        'c_branch_update_by',
        'c_branch_update_time',
        'c_branch_softdelete',
    ];
    public $timestamps = false;

    public static function datatables(){
        return BranchModel::where('c_branch_softdelete', 0)
            ->orderby('c_branch_code', 'ASC')
            ->get();
    }

    public static function getCode($id){
        $branch = BranchModel::where('c_branch_id', $id)
            ->select('c_branch_code')
            ->first();

        return $branch->c_branch_code;
    }

    public static function dropdown(){
        return BranchModel::select('c_branch_id','c_branch_code','c_branch_name')
            ->where('c_branch_softdelete', 0)
            ->orderby('c_branch_code', 'ASC')
            ->get();
    }

}
