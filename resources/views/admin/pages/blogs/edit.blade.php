@extends('admin.master')
@section('title', "Cập nhật bài viết")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật bài viết</h1>
    <a href="{{route('cp-admin.blogs.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Danh mục</a>
</div>

<div class="row  col-12">
    <form class="user  col-12 d-sm-flex align-items-center justify-content-between" action="{{ route('cp-admin.blogs.update',[ 'id' => $Blogs->id ]) }}" method="POST" enctype="multipart/form-data">
        <div class="card shadow mb-4 col-9">
            <div class="card-body">
                <div class="table-responsive">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề bài viết<span class="text-danger"> (*)</span></label>
                        <input type="text" name="name_blog"value="{{ old('name_blog', $Blogs->name_blog ?? null) }}" id="name_blog" onchange="ChangeToSlug('name_blog','slug_blog')" class="form-control form-control-user" placeholder="Tiêu đề bài viết ...">
                        @error('name_blog')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug<span class="text-danger"> (*)</span></label>
                        <input type="text" value="{{ old('slug_blog', $Blogs->slug_blog ?? null) }}" id="slug_blog" name="slug_blog" class="form-control form-control-user" placeholder="Slug đề bài viết ...">
                        @error('slug_blog')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh bài viết<span class="text-danger"> (*)</span></label>
                        <input onchange="previewFile(this)" id="avatar_image" type="file" id="image" name="image" class="form-control" require>
                        @error('image')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả gắn<span class="text-danger"> (*)</span></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="short_description" rows="3">{{ old('short_description', $Blogs->short_description ?? null) }}</textarea>
                        @error('short_description')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung bài viết<span class="text-danger"> (*)</span></label>
                        <textarea class="form-control" id="summernote" name="description"  rows="7">{{ old('description', $Blogs->description ?? null) }}</textarea>
                        @error('description')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Lưu lại</button>
                </div>
            </div>
        </div>
        <div class="card shadow ml-4 col-3 " style="margin-top: -16rem !important;"> 
            <div class="card-body">
                <div class="table-responsive">
                    <div class="form-group">
                    <label for="slugCategories">Loại bài viết</label>
                        <select class="custom-select" name="cate_blog_id" id="inputGroupSelect01">
                            @foreach($CategoryBlogs as $CategoryBlog)
                            <option value="{{$CategoryBlog->id}}" {{ $Blogs->cate_blog_id == $CategoryBlog->id ? "selected": "" }}>{{ $CategoryBlog->name}}</option>
                            @endforeach
                        </select>
                        @error('cate_blog_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group">
                    <label for="slugCategories">Trạng thái duyệt bài viết</label>
                    <select class="custom-select" name="status" id="inputGroupSelect01">
                            <option {{ $Blogs->status == 0 ? "selected": "" }} value="0">Chờ duyệt bài viết</option>
                            <option {{ $Blogs->status == 1 ? "selected": "" }} value="1">Đã duyệt bài viết</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group">
                    <label for="slugCategories">Hình ảnh</label>

                        <div class="mt-3 " style="width: 100%; height: 150px; text-align: center; display: block; " id="imgavatar1">
                            <img src="{{ asset('storage/' . $Blogs->image) }}" style="width: 100%; height: 100%;  border-radius: 2%; border: 2px solid #a1a1a1;" alt="{{auth()->user()->fullname}}">
                        </div>
                        <div class="mt-3 " style="width: 100%; height: 150px; text-align: center; display: none; " id="imgavatar2">
                            <img style="width: 100%; height: 100%;  border-radius: 2%; border: 2px solid #a1a1a1;" id="previewimgavatar" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
@section('javascript')
<script src="{{asset('admin/js/slug.js')}}"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()
        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
    function previewFile(input) {
        var file = $("#avatar_image").get(0).files[0];
        $("#imgavatar2").css("display", "block");
        $("#imgavatar1").css("display", "none");
        console.log(file);
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewimgavatar').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection