<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
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
            'name' => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên chủ đề không được trống',
            'name.min' => 'Tên chủ đề phải có ít nhất 6 ký tự'
        ];
    }
}
