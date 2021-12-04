<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => 'required|min:6|max:20|unique:users,user_name',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|min:8|max:30',
        ];
    }

        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_name.required' => 'Vui lòng điền tên đăng nhập',
            'user_name.min' => 'Tên đăng nhập phải có độ dài từ 6 - 20 kí tự',
            'user_name.max' => 'Tên đăng nhập phải có độ dài từ 6 - 20 kí tự',
            'user_name.unique' => 'Tên đăng nhập đã tồn tại',
            'password.required' => 'Vui lòng điền mật khẩu',
            'password.min' => 'Mật khẩu phải có dộ dài từ 8 - 30 kí tự',
            'password.max' => 'Mật khẩu phải có dộ dài từ 8 - 30 kí tự',
            'avatar.image' => 'Tệp không đúng định dạng',
            'avatar.mimes' => 'Ảnh phải là tệp thuộc loại: jpeg, png, jpg, gif, svg.',
            'avatar.max' => 'Vui lòng chọn ảnh nhỏ hơn 2MB',
        ];
    }
}
