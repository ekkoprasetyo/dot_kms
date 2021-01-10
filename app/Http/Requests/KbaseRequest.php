<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class KbaseRequest extends FormRequest
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
            case 'kbase.store':
                return [
                    'txt_kbase_title' => 'required',
                    'txt_kbase_content' => 'required',
                    'txt_kbase_tags' => 'required',
                ];
            case 'kbase.update':
                return [
                    'txt_kbase_title' => 'required',
                    'txt_kbase_content' => 'required',
                    'txt_kbase_tags' => 'required',
                ];
            default:break;
        }
    }

    public function attributes() {
        return [
            'txt_kbase_title' => 'Title',
            'txt_kbase_content' => 'Content',
            'txt_kbase_tags' => 'Tags',
        ];
    }
}
