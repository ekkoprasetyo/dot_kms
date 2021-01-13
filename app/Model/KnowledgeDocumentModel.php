<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KnowledgeDocumentModel extends Model
{
    protected $table = "t_kms_knowledge_document";
    protected $primaryKey = 'c_knowledge_document_id';
    protected $fillable = [
        'c_knowledge_document_tags',
        'c_knowledge_document_title',
        'c_knowledge_document_document',
        'c_knowledge_document_share',
        'c_knowledge_document_update_by',
        'c_knowledge_document_update_time',
        'c_knowledge_document_softdelete',
    ];
    public $timestamps = false;

    public static function datatables(){
        return KnowledgeDocumentModel::where('c_knowledge_document_softdelete', 0)
            ->leftJoin('t_kms_users', 't_kms_knowledge_document.c_knowledge_document_update_by', '=', 't_kms_users.c_users_id' )
            ->orderby('c_knowledge_document_update_time', 'DESC')
            ->get();
    }

    public static function detailKnowledgeDocument($id){
        return KnowledgeDocumentModel::where('c_knowledge_document_id', $id)
            ->leftJoin('t_kms_users', 't_kms_knowledge_document.c_knowledge_document_update_by', '=', 't_kms_users.c_users_id' )
            ->first();
    }
}
