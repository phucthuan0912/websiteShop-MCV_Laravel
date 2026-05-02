<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'email'=> 'required|email',
           
            'phone'=> 'required',
           
            
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => ' :attribute không được để trống',
            'name.max' => ' :attribute tối đa 255 ký tự',
            'email.required' => ' :attribute không được để trống',
            'email.email' => ' :attribute không đúng định dạng',
            'phone.required' => ' :attribute không được để trống',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password'=> 'required',
            'phone' => 'Số điện thoại',
            
        ];
    }
}
