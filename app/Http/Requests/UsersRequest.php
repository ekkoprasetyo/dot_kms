<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UsersRequest extends FormRequest
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
            case 'users.store':
                return [
                    'txt_users_nip' => 'required|numeric|unique:t_arms_users,c_users_nip',
                    'txt_users_fullname' => 'required',
                    'txt_users_email' => 'required|email|unique:t_arms_users,c_users_email',
                    'txt_users_password' => 'required|confirmed|min:6',
                    'txt_users_position' => 'required|numeric||unique:t_arms_users,c_users_position',
                    'txt_users_role' => 'required|numeric',
                    'txt_users_status' => 'required|numeric',
                ];
            case 'users.update':
                return [
                    'txt_users_nip' => 'required|numeric|unique:t_arms_users,c_users_nip,'.$this->get('txt_users_id').',c_users_id',
                    'txt_users_fullname' => 'required',
                    'txt_users_email' => 'required|email|unique:t_arms_users,c_users_email,'.$this->get('txt_users_id').',c_users_id',
                    'txt_users_position' => 'required|numeric||unique:t_arms_users,c_users_position,'.$this->get('txt_users_id').',c_users_id',
                    'txt_users_role' => 'required|numeric',
                    'txt_users_status' => 'required|numeric',
                ];
            case 'users.update-password':
                return [
                    'txt_users_password' => 'required|confirmed|min:6',
                ];
            default:break;
        }
    }

    public function attributes() {
        return [
            'txt_users_nip' => 'NIP',
            'txt_users_fullname' => 'Fullname',
            'txt_users_email' => 'Email',
            'txt_users_password' => 'Password',
            'txt_users_position' => 'Position',
            'txt_users_role' => 'Role',
            'txt_users_status' => 'Status',
        ];
    }
}
