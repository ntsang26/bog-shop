<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:50|unique:categories,name',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'name.required' => 'Vui lòng điền tên danh mục',
            'name.min' => 'Tên danh mục phải có độ dài từ 3 - 50 kí tự',
            'name.max' => 'Tên danh mục phải có độ dài từ 3 - 50 kí tự',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'thumbnail.required' => 'Vui lòng chọn ảnh',
            'thumbnail.image' => 'Tệp không đúng định dạng',
            'thumbnail.mimes' => 'Ảnh phải là tệp thuộc loại: jpeg, png, jpg, gif, svg.',
            'thumbnail.max' => 'Vui lòng chọn ảnh nhỏ hơn 2MB'
        ];
    }
}
