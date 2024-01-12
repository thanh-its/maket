<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisteredStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required|min:3|max:100',
            'phone' => 'required|numeric|digits_between:9,12|unique:users,phone',
            'address' => 'required|min:3|max:200',
            'email' => 'required|email|regex:/@fpt\.edu\.vn$/|unique:users,email',
            'store_name' => 'required|unique:group_users,name',
        ];
    }
    public function  messages()
    {
        return [
            'fullname.required' => 'Bạn chưa nhập họ và tên',
            'phone.unique' => 'Số điện thoại đã được sử dụng',
            'fullname.min' => 'Họ và tên phải có Độ dài  từ 3 đến 100 ký tự',
            'fullname.max' => 'Họ và tên phải có Độ dài  từ 3 đến 100 ký tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.digits_between' => 'Độ dài số điện thoại không hợp lệ',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.unique' => 'Địa chỉ không được trùng',
            'address.min' => 'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
            'address.max' => 'Địa chỉ phải có Độ dài  từ 3 đến 200 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.regex' => 'Email bắt buộc phải là @fpt.edu.vn',
            'email.email' => 'Email không đúng định dạng',
            'phone.unique' => 'Email đã được sử dụng',
        ];
    }
}
