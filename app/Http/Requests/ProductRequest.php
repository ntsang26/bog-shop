<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|min:2|max:50|unique:products,name',
            'price' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|min:5|max:255',
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
            'name.required' => 'Vui lòng điền tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có độ dài từ 2 - 50 kí tự',
            'name.max' => 'Tên sản phẩm phải có độ dài từ 2 - 50 kí tự',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'price.required' => 'Vui lòng điền giá sản phẩm',
            'thumbnail.required' => 'Vui lòng chọn ảnh',
            'thumbnail.image' => 'Tệp không đúng định dạng',
            'thumbnail.mimes' => 'Ảnh phải là tệp thuộc loại: jpeg, png, jpg, gif, svg.',
            'thumbnail.max' => 'Vui lòng chọn ảnh nhỏ hơn 2MB',
            'description.required' => 'Vui lòng điền mô tả',
            'description.min' => 'Mô tả phải có độ dài từ 5 - 255 kí tự',
            'description.max' => 'Mô tả phải có độ dài từ 5 - 255 kí tự'
        ];
    }
}
