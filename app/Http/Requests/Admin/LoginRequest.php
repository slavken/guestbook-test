<?php

namespace App\Http\Requests\Admin;

use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'g-recaptcha-response' => [
                'required',
                new Captcha()
            ]
        ];
    }

    public function messages()
    {
        return ['g-recaptcha-response.required' => 'Подтвердите captcha'];
    }
}
