<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
   public function rules(Request $request)
    {
        if ($this->method()=='PUT') {
            return [
                'name'=>'required|max:255|unique:categories,name,'.$request->get('id'),
                'description' => 'required|max:500'
            ];
        }else{
            return [
                'name' => 'required|max:255',
                'name'=>'required|unique:categories,name,'.$this->id,
                'description' => 'required|max:500'
            ]; 
        }
    }
    public function messages()
    {
        return [
            'name.required'=>'Hãy nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.max'=>'Độ dài tối đa là 100 ký tự',
            'description.required'=>'Hãy nhập mô tả',
            'description.max'=>'Độ dài tối đa là 500 ký tự'
        ];
    }
}