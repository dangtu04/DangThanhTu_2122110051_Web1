<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:6',
            'image' => 'nullable|file|mimes:jpg,png,gif,webp',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục không được trống',
            'name.min' => 'Tên danh mục phải có ít nhất 6 ký tự',
            'image.mimes' => 'Chỉ có thể nhập các file jpg, png, gif hoặc webp.'
        ];
    }
}
