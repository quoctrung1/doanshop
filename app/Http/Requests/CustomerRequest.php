<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:500',
            'email' => 'required|max:100',
            'postal_address' => 'required|max:500',
            'physical_address' => 'required|max:500'  

        ];
    }
    public function messages()
    {
        return [
            'first_name.required'=>'Hãy nhập tên ',
            'first_name.max'=>'Độ dài tối đa là 100 ký tự',
            'last_name.required'=>'Hãy nhập họ ',
            'last_name.max'=>'Độ dài tối đa là 100 ký tự',
            'email.required'=>'Hãy nhập email ',
            'email.max'=>'Độ dài tối đa là 100 ký tự',
            'postal_address.required'=>'Hãy nhập postal code ',
            'postal_address.max'=>'Độ dài tối đa là 100 ký tự',
            'physical_address.required'=>'Hãy nhập physical address ',
            'physical_address.max'=>'Độ dài tối đa là 100 ký tự',
        ];
    }
}
