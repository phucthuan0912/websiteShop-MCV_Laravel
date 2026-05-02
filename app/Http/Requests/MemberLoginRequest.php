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
            'name' => 'required|string|max:255',
            'password'=> 'required',
           
           
            
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => ' :attribute không được để trống',
            'name.max' => ' :attribute tối đa 255 ký tự',
            'password.required' => ' :attribute không được để trống',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'password'=> 'Mật khẩu',
            
        ];
    }
}
