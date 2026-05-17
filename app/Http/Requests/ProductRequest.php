<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'id_category' => 'required|exists:categories,id',
            'id_brand' => 'required|exists:brands,id',
            'company' => 'nullable|string|max:255',
            'detail' => 'nullable|string',
            'status' => 'required|in:0,1',
            'sale' => 'required_if:status,1|nullable|numeric|min:0|max:100',
        ];
        
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['image'] = 'nullable|array|min:1|max:3';
            $rules['image.*'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:3072';
        } else {
            
            $rules['image'] = 'required|array|min:1|max:3';
            $rules['image.*'] = 'required|image|mimes:jpeg,png,jpg,gif|max:3072';
        }
        
        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.max' => 'Tên sản phẩm tối đa 255 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0',
            'id_category.required' => 'Vui lòng chọn danh mục',
            'id_category.exists' => 'Danh mục không tồn tại',
            'id_brand.required' => 'Vui lòng chọn thương hiệu',
            'id_brand.exists' => 'Thương hiệu không tồn tại',
            'company.max' => 'Tên công ty tối đa 255 ký tự',
            'status.required' => 'Vui lòng chọn trạng thái',
            'status.in' => 'Trạng thái không hợp lệ',
            'sale.required_if' => '% khuyến mãi không được để trống khi chọn Sale',
            'sale.numeric' => '% khuyến mãi phải là số',
            'sale.min' => '% khuyến mãi phải lớn hơn hoặc bằng 0',
            'sale.max' => '% khuyến mãi không được vượt quá 100',
            'image.required' => 'Vui lòng chọn ảnh sản phẩm',
            'image.array' => 'Ảnh sản phẩm phải là mảng',
            'image.min' => 'Vui lòng chọn ít nhất 1 ảnh',
            'image.max' => 'Chỉ được upload tối đa 3 ảnh',
            'image.*.required' => 'File ảnh không được để trống',
            'image.*.image' => 'File phải là ảnh',
            'image.*.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif',
            'image.*.max' => 'Mỗi ảnh không được vượt quá 3MB',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá sản phẩm',
            'id_category' => 'Danh mục',
            'id_brand' => 'Thương hiệu',
            'stock' => 'Số lượng',
            'company' => 'Công ty',
            'description' => 'Mô tả',
            'status' => 'Trạng thái',
            'sale' => 'Khuyến mãi',
            'image' => 'Ảnh sản phẩm',
        ];
    }
}