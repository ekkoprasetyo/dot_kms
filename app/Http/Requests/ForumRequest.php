<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ForumRequest extends FormRequest
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
            case 'forum.store':
                return [
                    'txt_forum_issue' => 'required|unique:t_kms_forum,c_forum_issue',
                    'txt_forum_tags' => 'required',
                ];
            case 'forum.update':
                return [
                    'txt_forum_issue' => 'required|unique:t_kms_forum,c_forum_issue,'.$this->get('txt_forum_id').',c_forum_id',
                    'txt_forum_tags' => 'required',
                ];
            default:break;
        }
    }

    public function attributes() {
        return [
            'txt_forum_issue' => 'Issue',
            'txt_forum_tags' => 'Tags',
        ];
    }
}
