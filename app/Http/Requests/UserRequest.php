<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'name' => ['required','max:255'],
            "phone_number" =>['required']
          
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'يرجى تعبئة الايميل',
        ];
    }
}
