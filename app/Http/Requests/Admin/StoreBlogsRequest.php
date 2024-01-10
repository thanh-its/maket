<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogsRequest extends FormRequest
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
            'name_blog'=>'required|min:3|max:100|unique:blogs,name_blog',
            'slug_blog'=>'required|min:3|max:100|unique:blogs,slug_blog',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'short_description'=>'required|max:300|min:4',
            'description'=>'required|min:4',
            'status' => 'required|integer|min:0|max:1',
            'cate_blog_id' => 'required|integer|min:1'
        ];
    }
    public function  messages()
    {
        return [
            'name_blog.required'=>'Bạn chưa nhập tiêu đề bài viết',
            'name_blog.unique' => 'Tiêu đề bài viết không được trùng',
            'name_blog.min'=>'Tiêu đề bài viết phải có Độ dài  từ 3 đến 100 ký tự',
            'name_blog.max'=>'Tiêu đề bài viết phải có Độ dài  từ 3 đến 100 ký tự',
            'slug_blog.required'=>'Bạn chưa nhập slug',
            'slug_blog.unique' => 'slug_blog không được trùng',
            'slug_blog.min'=>'slug phải có Độ dài  từ 3 đến 100 ký tự',
            'slug_blog.max'=>'slug phải có Độ dài  từ 3 đến 100 ký tự',
            'status.required' => 'Trạng thái Không hợp lệ',
            'status.integer' => 'Trạng thái Không hợp lệ',
            'status.min'=>'Trạng thái Không hợp lệ',
            'status.max'=>'Trạng thái Không hợp lệ',
            'short_description.required' => 'Mời nhập mô tả ngắn!',
            'short_description.max' => 'Mô tả ngắn không quá 300 ký tự!',
            'short_description.min' => 'Mô tả ngắn ít nhất 4 ký tự!',
            'description.required' => 'Mời nhập mô tả!',
            'description.min' => 'Mô tả  ít nhất 4 ký tự!',
            'image.required' => 'Bạn chưa chọn ảnh',
            'image.mimetypes' => 'Ảnh không đúng định dang:jpeg /png /jpg ',
            'image.max' => 'Kích thước ảnh tối đa 2048 kb',
            'cate_blog_id.required' => 'Loại bài viết Không hợp lệ',
            'cate_blog_id.integer' => 'Loại bài viết Không hợp lệ',
            'cate_blog_id.min'=>'Loại bài viết Không hợp lệ',
        ];
    }
}
