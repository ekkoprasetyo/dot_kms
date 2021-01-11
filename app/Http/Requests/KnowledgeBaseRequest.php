<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class KnowledgeBaseRequest extends FormRequest
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
            case 'knowledge-base.store':
                return [
                    'txt_knowledge_base_title' => 'required',
                    'txt_knowledge_base_content' => 'required',
                    'txt_knowledge_base_tags' => 'required',
                ];
            case 'knowledge-base.update':
                return [
                    'txt_knowledge_base_title' => 'required',
                    'txt_knowledge_base_content' => 'required',
                    'txt_knowledge_base_tags' => 'required',
                ];
            default:break;
        }
    }

    public function attributes() {
        return [
            'txt_knowledge_base_title' => 'Title',
            'txt_knowledge_base_content' => 'Content',
            'txt_knowledge_base_tags' => 'Tags',
        ];
    }
}
