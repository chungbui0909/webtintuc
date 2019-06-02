<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestThemTheLoai extends FormRequest
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
            'name_theloai'=>'required|min:3|max:150|unique:theloai,Ten',
            // |unique:theloai     
        ];
    }
    public function messages()
    {
        return [
            'name_theloai.required' => 'Tên thể loại không được bỏ trống.',
            'name_theloai.unique' => 'Tên thể loại đã tồn tại. Vui lòng đặt tên khác.',
            'name_theloai.min' => 'Tên thể loại quá ngắn. Độ dài nằm trong khoảng 3-50 kí tự.',
            'name_theloai.max' => 'Tên thể loại quá dài. Độ dài nằm trong khoảng 3-50 kí tự.',
            
        ];
    }
}
