<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreBlogsRequest;
use App\Http\Requests\Admin\UpdateBlogsRequest;
use App\Models\Product;
use App\Models\Blogs;
use App\Models\CategoryBlog;
use App\Models\Origin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use GuzzleHttp\Handler\Proxy;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        $CategoryBlogs = CategoryBlog::all();
        $blogs = Blogs::filter(request(['search','cate_blog_id','status']))->orderBy('id', 'DESC')->Paginate(30);
        $blogs->load('CategoryBlog'); // gọi blogs bên model
        $blogs->load('User');
        return view('admin.pages.blogs.index', compact('blogs','CategoryBlogs'));
    }
    public function create()
    {
        $CategoryBlogs = CategoryBlog::orderBy('id','DESC')->get();
        return view('admin.pages.blogs.create', compact('CategoryBlogs'));
    }
    public function store(StoreBlogsRequest $request)
    {
        // dd($request->all());
        $pathAvatar = $request->file('image')->store('public/images/blogs');
        $pathAvatar = str_replace("public/", "", $pathAvatar);
        try {
            DB::beginTransaction();
            $data = request()->all();
            $data['users_id'] = auth()->user()->id;
            $data['image'] = $pathAvatar;
            Blogs::create($data);
            DB::commit();
            return redirect()->route('cp-admin.blogs.index')->with('message', 'Thêm bài viết thành công !');
        } catch (Exception $exception) {
            DB::rollBack();
           // Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());
            if (file_exists('storage/' . $pathAvatar)) {
                unlink('storage/' . $pathAvatar);
            }
            return redirect()->route('cp-admin.blogs.index')->with('error', 'Thêm bài viết thất bại !');
        }
    }
    public function edit($id)
    {
        
        $Blogs = Blogs::find($id);
        if(!$Blogs){
            
              return redirect()->route('cp-admin.blogs.index')->with('error', 'Trang không tồn tại !');
        }
        $CategoryBlogs = CategoryBlog::all();
        return view('admin.pages.blogs.edit', compact('Blogs', 'CategoryBlogs'));
    }
    public function update(UpdateBlogsRequest $request, $id)
    {
        
        $Blogs = Blogs::find($id);
        if(!$Blogs){
              return redirect()->route('cp-admin.blogs.index')->with('error', 'Trang không tồn tại !');
        }

        if ($request->file('image') != null) {
            if (file_exists('storage/' . $Blogs->image)) {
                unlink('storage/' . $Blogs->image);
            }
            $pathAvatar = $request->file('image')->store('public/images/blogs');
            $pathAvatar = str_replace("public/", "", $pathAvatar);
        } else {
            $pathAvatar = $Blogs->image;
        }

        try {
            DB::beginTransaction();

            $data = request()->all();
            $data['users_id'] = auth()->user()->id;
            $data['image'] = $pathAvatar;

            $Blogs->update($data);
            DB::commit();
            return redirect()->route('cp-admin.blogs.index')->with('message', 'Cập nhật bài viết thành công');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());
            if (file_exists('storage/' . $pathAvatar)) {
                unlink('storage/' . $pathAvatar);
            }
            return redirect()->route('cp-admin.blogs.index')->with('error', 'Sửa bài viết thất bại !');
        }
    }
    public function delete($id)
    {
        $Blogs = Blogs::find($id);
        if(!$Blogs){
            return response()->json([
                'message' => "Không tìm thấy bài viết",
                'status' => "401"
            ]);
        }
       
            if (file_exists('storage/' . $Blogs->image)) {
                unlink('storage/' . $Blogs->image);
            }
            $Blogs->delete();
            return response()->json([
                'message' => "Xóa bài viết thành công",
                'status' => "200"
            ]);
        

    }
}
