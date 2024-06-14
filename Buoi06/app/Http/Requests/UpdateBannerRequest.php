<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'nullable|file|mimes:jpg,png,gif,webp',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên banner không được trống',
            'image.mimes' => 'Chỉ có thể nhập các file jpg, png, gif hoặc webp.'
        ];
    }
}
