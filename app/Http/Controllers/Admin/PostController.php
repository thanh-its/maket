<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function getDanhSach()
    {
        $post = Post::all();
        return view('admin.layout.post.list',['post'=>$post]);
    }

    public function getSua($id)
    {
        $post = Post::find($id);
        return view('admin/layout/post/edit',['post'=>$post]);
    }

    public function postSua(Request $request,$id)
    { 
        $this->validate($request,[
            'txtTittle' => 'required|unique:posts,title',
            'txtContent' => 'required',
            'txtSource' => 'required',
            'txtDescription' => 'required'
        ],
        [
            'txtTittle.required' => 'Bạn chưa nhập tiêu đề bài viết',
            'txtTittle.unique' => 'Tiêu đề bài viết không được trùng',
            'txtContent.required' => 'Bạn chưa nhập nội dung cho bài viết',
            'txtSource.required' => 'Bạn chưa nhập nguồn bài viết',
            'txtDescription.required' => 'Bạn chưa nhập mô tả cho bài viết'
        ]);

        $post = Post::find($id);
        $post->title = $request->txtTittle;
        $post->image = $request->image;
        $post->content = $request->txtContent;
        $post->source = $request->txtSource;
        $post->date_update = $request->date_update;
        $post->description = $request->txtDescription;
        $post->save();
        return redirect('admin/post/edit/'.$id)->with('thongbao','Sửa thành công!!!!');
    }

    public function getThem()
    {
        return view('admin.layout.post.add');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'txtTittle' => 'required|unique:posts,title',
            'txtContent' => 'required',
            'txtSource' => 'required',
            'txtDescription' => 'required'
        ],
        [
            'txtTittle.required' => 'Bạn chưa nhập tiêu đề bài viết',
            'txtTittle.unique' => 'Tiêu đề bài viết không được trùng',
            'txtContent.required' => 'Bạn chưa nhập nội dung cho bài viết',
            'txtSource.required' => 'Bạn chưa nhập nguồn bài viết',
            'txtDescription.required' => 'Bạn chưa nhập mô tả cho bài viết'
        ]);

        $post = new Post();
        $post->title = $request->txtTittle;
        $post->image = $request->image;
        $post->content = $request->txtContent;
        $post->source = $request->txtSource;
        $post->date_update = $request->date_update;
        $post->description = $request->txtDescription;
        $post->save();
        return redirect('admin/post/add')->with('thongbao','Thêm thành công!!!');
    }

    public function getXoa($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        return redirect('admin/post/list')->with('thongbao','Xóa thành công!!!');
    }

}
