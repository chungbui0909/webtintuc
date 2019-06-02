<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestThemUser extends FormRequest
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
            'name'=>'required|min:5|max:50',
            'email'=>'required|unique:users,email|min:5|max:50',
            'password'=>'required|min:5|max:50',
            'passwordAgain'=>'required|same:password',
            'level'=>'required',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Tên không được bỏ trống',
            'name.min'=>'Tên quá ngắn. Độ dài trong khoảng 5 - 50 ký tự.',
            'name.max'=>'Tên quá dài. Độ dài trong khoảng 5 - 50 ký tự.',
            'email.required'=>'Email không được bỏ trống',
            'email.unique'=>'Email đã tồn tại.',
            'email.min'=>'Tên quá ngắn. Độ dài trong khoảng 5 - 50 ký tự.',
            'email.max'=>'Tên quá dài. Độ dài trong khoảng 5 - 50 ký tự.',
            'password.required'=>'Password không được bỏ trống',
            'password.min'=>'Password quá ngắn. Độ dài trong khoảng 5 - 50 ký tự.',
            'password.max'=>'Password quá dài. Độ dài trong khoảng 5 - 50 ký tự.',
            'passwordAgain.required'=>'passwordAgain không được bỏ trống',
            'passwordAgain.same'=>'passwordAgain không khớp với password',

            'level.required'=>'Level không được bỏ trống.',
        ];
    }
}
