<?php

namespace App\Http\Requests;

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
   public function rules()
    {
        return [
            'name' => 'required|max:100',
            'name'=>'required|unique:categories,name,'.$this->id,
            'description' => 'required|max:500'
        ];
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
