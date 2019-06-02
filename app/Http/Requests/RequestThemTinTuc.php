<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestThemTinTuc extends FormRequest
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
            'LoaiTin'=>'required',
            'TieuDe'=>'required|unique:TinTuc,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required',
        ];
    }
    public function messages(){
        return [
            'LoaiTin.required'=>'Chọn loại tin.',
            'TieuDe.required'=>'Tiêu đề không được bỏ trống.',
            'TieuDe.unique'=>'Tên tiêu đã tồn tại.',
            'TomTat.required'=>'Tóm tắt không được bỏ trống.',
            'NoiDung.required'=>'Nội dung không được bỏ trống.',
        ];
    }
}
