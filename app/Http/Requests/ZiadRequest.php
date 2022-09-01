<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZiadRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email','unique:users'],
            'password' => ['required', 'string'],
            'password_confirm' => ['required', 'string'],
            'name' => ['required','max:255'],
            "phone_number" =>['required']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'هذا الحقل مطلوب',
        ];
    }

}
