<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required|min:6',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',            
            'image' => 'nullable|file|mimes:jpg,png,gif,webp',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'username.required' => 'Tên đăng nhập không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'email.required' => 'Email không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'image.mimes' => 'Chỉ có thể nhập các file jpg, png, gif hoặc webp.'
        ];
    }
}
