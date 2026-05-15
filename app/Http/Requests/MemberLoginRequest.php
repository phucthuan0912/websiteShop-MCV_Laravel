<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MemberLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|',
            'password'=> 'required',
           
           
            
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => ' :attribute không được để trống',
            
            'password.required' => ' :attribute không được để trống',
        ];
    }
    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password'=> 'Mật khẩu',
            
        ];
    }
}
