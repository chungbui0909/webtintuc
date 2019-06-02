<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestThemSlide extends FormRequest
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
            'TenSlide'=>"required",
            // 'Hinh'=>'required',
            'NoiDung'=>'required',
        ];
    }
    public function messages(){
        return [
            'TenSlide.required'=>'Tên slide không được bỏ trống.',
             // 'Hinh.required'=>'Hình slide không được bỏ trống.',
            'NoiDung.required'=>'Nội dung slide không được bỏ trống.',
        ];
    }
}
