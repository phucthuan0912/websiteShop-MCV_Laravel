<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
     */  public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập :attribute',
            'description.required' => 'Vui lòng nhập :attribute',
            'content.required' => 'Vui lòng nhập :attribute',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'description' => 'Mô tả',
            'content' => 'Nội dung',
    
        ];
    }
}
