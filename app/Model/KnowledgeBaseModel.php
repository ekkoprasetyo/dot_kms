<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseModel extends Model
{
    protected $table = "t_kms_knowledge_base";
    protected $primaryKey = 'c_knowledge_base_id';
    protected $fillable = [
        'c_knowledge_base_tags',
        'c_knowledge_base_title',
        'c_knowledge_base_content',
        'c_knowledge_base_update_by',
        'c_knowledge_base_update_time',
        'c_knowledge_base_softdelete',
    ];
    public $timestamps = false;

    public static function datatables(){
        return KnowledgeBaseModel::where('c_knowledge_base_softdelete', 0)
            ->leftJoin('t_kms_users', 't_kms_knowledge_base.c_knowledge_base_update_by', '=', 't_kms_users.c_users_id' )
            ->orderby('c_knowledge_base_update_time', 'DESC')
            ->get();
    }

    public static function detailKnowledgeBase($id){
        return KnowledgeBaseModel::where('c_knowledge_base_id', $id)
            ->leftJoin('t_kms_users', 't_kms_knowledge_base.c_knowledge_base_update_by', '=', 't_kms_users.c_users_id' )
            ->first();
    }
}
