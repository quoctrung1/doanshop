<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_number' => 'required',
            'transaction' => 'required',
            'customer_id' => 'required',
            'status' => 'required',
            'total_amount' => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'order_number.required'=>'Hãy nhập số  ',
            'order_number.max'=>'Độ dài tối đa là 100 ký tự',
            'transaction.required'=>'Hãy nhập ngày ',
            'customer_id.max'=>'Độ dài tối đa là 100 ký tự',
            'customer_id.required'=>'Hãy nhập giá id  ',
            'status.required'=>'Hãy nhập nội dung ',
            'status.max'=>'Độ dài tối đa là 500 ký tự',
            'total_amount.required' => 'Hãy nhập tổng tiền'
        ];
    }
}
