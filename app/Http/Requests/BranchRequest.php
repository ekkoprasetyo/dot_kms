<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class BranchRequest extends FormRequest
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
            case 'branch.store':
                return [
                    'txt_branch_code' => 'required|min:2|max:4|unique:t_kms_branch,c_branch_code',
                    'txt_branch_name' => 'required',
                ];
            case 'branch.update':
                return [
                    'txt_branch_code' => 'required|min:2|max:4|unique:t_kms_branch,c_branch_code,'.$this->get('txt_branch_id').',c_branch_id',
                    'txt_branch_name' => 'required',
                ];
            default:break;
        }
    }

    public function attributes() {
        return [
            'txt_branch_code' => 'Abbreviation',
            'txt_branch_name' => 'Name',
        ];
    }
}
