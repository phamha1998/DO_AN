<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5',
            'full'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric'


        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Vui lòng nhập email ',
            'email.email'=>'Vui lòng nhập đúng định dạng email ',
            'email.unique'=>'Email đã tồn tại ',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 5 ký tự',
            'full.required'=>'Vui lòng nhập tên người dùng',
            'address.required'=>'Vui lòng nhập địa chỉ người dùng',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.numeric'=>'Số điện thoại phải là số'



        ];
    }
}
