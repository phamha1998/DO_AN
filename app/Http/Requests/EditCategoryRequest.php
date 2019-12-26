<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
            'name'=>'required|unique:category,name,'.$this->id.',id',
            
            
            
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng tên Danh mục',
            'name.unique'=>'Tên Danh mục không dc trùng'
            
            
            
        ];
    }
}
