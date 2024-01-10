<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'namePro'=>'required|min:3|max:100|unique:products,namePro',
            'slug'=>'required|min:3|max:100|unique:products,slug',
            'image'=>'required|mimes:jpg,bmp,png|max:2048', 
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'discounts' => 'required|numeric|min:0|max:100',
            'status'=> 'required|numeric|min:0|max:1', 
            'category_id'=>'required|numeric|min:1', 
            'supplier_id'=>'required|numeric|min:1', 
            'origin_id'=>'required|numeric|min:1'
        ];
    }
}
