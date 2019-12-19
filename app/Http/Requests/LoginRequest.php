<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|min:5|email',
            'password'=>'required|min:5|'
            
            
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Vui lòng nhập đúng định dạng của email',
            'email.min'=>'Vui lòng nhập độ dài email lơn hơn 5 ký tự',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Vui lòng nhập độ dài password lơn hơn 5 ký tự'
            
            
        ];
    }
}
