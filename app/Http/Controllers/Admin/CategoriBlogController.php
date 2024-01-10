<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryBlog;
class CategoriBlogController extends Controller
{
    public function index(Request $request)
    {
        $categoryBlogs = CategoryBlog::filter(request(['search']))->orderBy('id','DESC')->paginate(15);
        $categoryBlogs->load('blogs'); // gọi blogs bên model
      //  dd($categoryBlogs);
        return view('admin.pages.categoryblog.index',compact('categoryBlogs'));
    }

    public function create()
    {
        return view('admin.pages.categoryblog.create');
    }
    public function store(Request $request)
    { 
        $this->validate(request(),[
            'name'=>'required|min:3|max:100|unique:category_blogs,name',
            'slug'=>'required|min:3|max:100|unique:category_blogs,slug',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Tên danh mục không được trùng',
            'name.min'=>'Tên danh mục phải có Độ dài  từ 3 đến 100 ký tự',
            'name.max'=>'Tên danh mục phải có Độ dài  từ 3 đến 100 ký tự',
            'slug.required'=>'Bạn chưa nhập slug',
            'slug.unique' => 'Slug không được trùng',
            'slug.min'=>'Slug phải có Độ dài  từ 3 đến 100 ký tự',
            'slug.max'=>'Slug phải có Độ dài  từ 3 đến 100 ký tự',
        ]);
        $data = request(['name','slug']);
        $data['users_id'] = auth()->user()->id;
        CategoryBlog::create($data);
       return redirect()->route('cp-admin.cate_blog.index')->with('message','Tạo danh mục thành công');
    }
    public function edit($id)
    {
        $categoryBlogs = CategoryBlog::find($id);
        if(!$categoryBlogs){
            return redirect()->back();
        }
        return view('admin.pages.categoryblog.edit', compact('categoryBlogs'));
    }
    public function update(Request $request ,$id)
    {   
        $CategoryBlog = CategoryBlog::find($id);
        if(!$CategoryBlog){
            return redirect()->back();
        }
        $this->validate(request(),[
            'name'=>'required|min:3|max:100|unique:category_blogs,name,'.$CategoryBlog->id,
            'slug'=>'required|min:3|max:100|unique:category_blogs,slug,'.$CategoryBlog->id,
            'banner' => 'mimes:jpg,bmp,png|max:2048',
        ],
        [
            'name.required'=>'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Tên danh mục không được trùng',
            'name.min'=>'Tên danh mục phải có Độ dài  từ 3 đến 100 ký tự',
            'name.max'=>'Tên danh mục phải có Độ dài  từ 3 đến 100 ký tự',
            'slug.required'=>'Bạn chưa nhập slug',
            'slug.unique' => 'Slug không được trùng',
            'slug.min'=>'Slug phải có Độ dài  từ 3 đến 100 ký tự',
            'slug.max'=>'Slug phải có Độ dài  từ 3 đến 100 ký tự',
        ]);
        $data = request(['name','slug']);
        $data['users_id'] = auth()->user()->id;
        $CategoryBlog->update($data);
         return redirect()->route('cp-admin.cate_blog.index')->with('message','Cập nhật thành công');
    }
    public function delete($id)
    {
        $CategoryBlog = CategoryBlog::find($id);
        $CategoryBlog->load('blogs');
        if($CategoryBlog){
            if($CategoryBlog->blogs->count()>=1){
                return response()->json([
                    'message' => "Không thể xóa khi vẫn còn số lượng bài viết",
                    'status' => "401"
                ]); 
            }
            $CategoryBlog->delete();
            return response()->json([
                'message' => "Xóa damh mục bài viết thành công",
                'status' => "200"
            ]);
        }
        return response()->json([
            'message' => "Không tìm thấy danh mục bài viết",
            'status' => "401"
        ]);
    }
}
