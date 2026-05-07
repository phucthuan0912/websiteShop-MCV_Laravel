<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MemberRegisterRequest extends FormRequest
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
            'name' => 'required|min:5|max:15',
            'email' => 'required|email',
            'password' => 'required|min:5|max:15',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|',
            'phone' => 'required'
            
        ];
    }
    public function messages(): array{
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'avatar.required' => 'Ảnh không được để trống',
            'phone.required' => 'sdt khong duoc de trong'
        ];
    }
    public function attributes(): array {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'avatar' => 'Ảnh',
            'phone' => "SDT"

        ];
    }
}
