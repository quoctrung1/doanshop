<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_code' => 'required|max:100',
            'name' => 'required|max:100',
            'description' => 'required|max:500',
            'price' =>'required|numeric',
            'quantity' =>'required',
            'promotion' =>'required|numeric',
            'brand_id' => 'required',
            'category_id' => 'required',
            'image' => 'required',


        ];
    }
    public function messages()
    {
        return [
            'product_code.required'=>'Hãy nhập mã sản phẩm',
            'product_code.max'=>'Độ dài tối đa là 100 ký tự',
            'name.required'=>'Hãy nhập tên sản phẩm',
            'name.max'=>'Độ dài tối đa là 100 ký tự',
            'quantity.required'=>'Hãy nhập chất lượng sản phẩm',
            'price.required'=>'Hãy nhập giá tiền sản phẩm',
            'price.numeric'=>'Bạn nhập sai kiểu dữ liệu',
            'promotion.required'=>'Hãy nhập khuyến mãi sản phẩm',
            'promotion.numeric'=>'Bạn nhập sai kiểu dữ liệu',
            'description.required'=>'Hãy nhập nội dung sản phẩm',
            'description.max'=>'Độ dài tối đa là 500 ký tự',
            'brand_id.required'=>'Hãy chọn nhãn hàng ',
            'category_id.required'=>'Hãy chọn danh mục ',
            'image.required'=>'Hãy chọn ảnh '

        ];
    }
}