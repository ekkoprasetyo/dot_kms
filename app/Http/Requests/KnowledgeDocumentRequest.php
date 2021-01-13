<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class KnowledgeDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch(Route::currentRouteName()) {
            case 'knowledge-document.store':
                return [
                    'txt_knowledge_document_title' => 'required',
                    'txt_knowledge_document_document' => 'required',
                    'txt_knowledge_document_tags' => 'required',
                    'txt_knowledge_document_share' => 'required',
                ];
            case 'knowledge-document.update':
                return [
                    'txt_knowledge_document_title' => 'required',
                    'txt_knowledge_document_document' => 'required',
                    'txt_knowledge_document_share' => 'required',
                ];
            default:break;
        }
    }

    public function attributes() {
        return [
            'txt_knowledge_document_title' => 'Title',
            'txt_knowledge_document_document' => 'Document',
            'txt_knowledge_document_tags' => 'Tags',
            'txt_knowledge_document_share' => 'Share to',
        ];
    }
}
