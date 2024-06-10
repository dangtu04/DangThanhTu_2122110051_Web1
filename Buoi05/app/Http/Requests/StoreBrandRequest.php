<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // /**
    //  * Get the validation rules that apply to the request.
    //  *
    //  * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    //  */
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
            'name.required' => 'Tên thương hiệu không được trống',
            'image.mimes' => 'Chỉ có thể nhập các file jpg, png, gif hoặc webp.'
        ];
    }
}
