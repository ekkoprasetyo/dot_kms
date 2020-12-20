<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class LoginRequest extends FormRequest
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
            case 'login.validate':
                return [
                    'txt_cred' => 'required',
                    'txt_password' => 'required',
                    'txt_captcha' => 'required|captcha',
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'captcha' => 'Incorrect Captcha',
        ];
    }

    public function attributes() {
        return [
            'txt_cred' => 'Credential',
            'txt_password' => 'Password',
            'txt_captcha' => 'Captcha',
        ];
    }
}
