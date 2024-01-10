<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|min:3|max:100',
            'phone' => 'required|numeric|digits_between:10,12',
            'address' => 'required|min:3|max:200',
        ];
    }
    public function  messages()
    {
        return [
            'fullname.required' => 'Bạn chưa nhập họ và tên',
            'fullname.min' => 'Họ và tên phải có Độ dài  từ 3 đến 100 ký tự',
            'fullname.max' => 'Họ và tên phải có Độ dài  từ 3 đến 100 ký tự',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.digits_between' => 'Độ dài số điện thoại không hợp lệ',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.min' => 'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
            'address.max' => 'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
        ];
    }
}
