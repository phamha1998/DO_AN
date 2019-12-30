<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'product_code'=>'required',
            'product_name'=>'required',
            
            'product_price'=>'required|numeric',
            'product_img'=>'img'


        ];
    }
    public function messages()
    {
        return [
            'product_code.required'=>'Vui lòng nhập mã sản phẩm',
            'product_name.required'=>'Vui lòng nhập tên sản phẩm',
            'product_price.required'=>'Vui lòng nhập giá sản phẩm',
           
            'product_img.img'=>'File ảnh không đúng định dạng',
            'product_price.numeric'=>'Giá sản phẩm phải là số'



        ];
    }
}
