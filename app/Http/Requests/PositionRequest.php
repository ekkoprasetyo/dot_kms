<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class PositionRequest extends FormRequest
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
            case 'position.store':
                return [
                    'txt_position_abbr' => 'required|min:2|max:7|unique:t_kms_position,c_position_abbr',
                    'txt_position_name' => 'required',
                    'txt_position_branch' => 'required|numeric',
                ];
            case 'position.update':
                return [
                    'txt_position_abbr' => 'required|min:2|max:7|unique:t_kms_position,c_position_abbr,'.$this->get('txt_position_id').',c_position_id',
                    'txt_position_name' => 'required',
                    'txt_position_branch' => 'required|numeric',
                ];
            default:break;
        }
    }

    public function attributes() {
        return [
            'txt_position_abbr' => 'Abbreviation',
            'txt_position_name' => 'Name',
            'txt_position_branch' => 'Branch',
        ];
    }
}
