<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestThemLoaiTin extends FormRequest
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
            'tenLoaiTin'=>'required|min:3|max:150|unique:loaitin,Ten',
            // |unique:theloai
           
        ];
    }
    public function messages()
    {
        return [
            'tenLoaiTin.required' => 'Tên loại tin không được bỏ trống.',
            'tenLoaiTin.unique' => 'Tên loại tin đã tồn tại. Vui lòng đặt tên khác.',
            'tenLoaiTin.min' => 'Tên loại tin quá ngắn. Độ dài nằm trong khoảng 3-50 kí tự.',
            'tenLoaiTin.max' => 'Tên loại tin quá dài. Độ dài nằm trong khoảng 3-50 kí tự.',
            
        ];
    }
}
