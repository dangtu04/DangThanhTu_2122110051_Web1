<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required',
            'image' => 'nullable|file|mimes:jpg,png,gif,webp',
            'price' => 'required|numeric|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm không được trống',
            'image.mimes' => 'Chỉ có thể nhập các file jpg, png, gif hoặc webp.',
            'price.required' => 'Giá sản phẩm không được trống',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm tối thiểu là 1',
        ];
    }
}
