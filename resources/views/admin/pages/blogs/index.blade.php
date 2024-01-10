@extends('admin.master')
@section('title', "Bài viết ")
@section('style')
<style>
    .sreach {
        border: 1px solid black !important;
    }
</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh sách bài viết</h1>
    @can('THEM-BAI-VIET')
    <a href="{{route('cp-admin.blogs.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Thêm bài viết</a>
    @endcan
</div>

<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <form name="fillter_pro" class="" action="" method="get">
            <div class="input-group">
                <input type="hidden" class="form-control bg-light border-0 small sreach" name="page" value="{{request('page') ? request('page') : '1' }}" aria-label="Search" aria-describedby="basic-addon2">
                <div class="d-flex justify-content-between w-100">
                    <input type="text" class="form-control bg-light border-0 small sreach m-2" name="search" placeholder="Tìm bài viết ..." value="{{request('search') ? request('search') : '' }}" aria-label="Search" aria-describedby="basic-addon2">
                    <select id="inputState" name="cate_blog_id" class="form-control m-2">   
                        <option value=""  {{request("cate_blog_id") ? "selected" : "" }}>Tất cả loại bài viết...</option>
                        @foreach($CategoryBlogs as $CategoryBlog)
                        <option value="{{$CategoryBlog->id}}" {{request("cate_blog_id") == $CategoryBlog->id ? "selected" : "" }}>{{$CategoryBlog->name }}</option>
                        @endforeach
                    </select>
                    <select id="inputState" name="status" class="form-control m-2">
                    <option value=""  {{request("status")=="" ? "selected" : "" }}>Tất cả</option>
                        <option value="1"  {{request("status")== 1 ? "selected" : "" }}>Đã duyệt bài viết </option>
                        <option value="2"  {{request("status") == 2 ? "selected" : "" }}>Chưa duyệt bài viết</option>
                    </select>
                    <button class="btn btn-primary m-2" id="fillter_pro" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên </th>
                        <th>Thuộc loại</th>
                        <th>Tác giả</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>ID</th>
                        <th>Tên </th>
                        <th>Thuộc loại</th>
                        <th>Tác giả</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach( $blogs as $blog)
                    <tr id="pro{{ $blog->id }}">
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->name_blog}}</td>
                        <td>{{ $blog->CategoryBlog->name }}</td>
                        <td>{{ $blog->User->fullname }}</td>
                        <td><span  class="btn {{$blog->status==1?'btn-primary':'btn-danger'}} w-100">{{ App\Common\Constants::STATUS_BLOGS[$blog->status] }}</span></td>
                        <td>
                        @can('SUA-BAI-VIET')
                            <a href="{{route('cp-admin.blogs.edit',[ 'id' => $blog->id ])}}" class="btn-lg"><i class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('XOA-BAI-VIET')
                            <a class="btn-lg" onclick="deleteCate({{ $blog->id}})"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="card-header py-3">
        {!! $blogs->links('pagination::bootstrap-4') !!}
    </div>
</div>

@endsection
@section('javascript')
@if(session('message'))
<script>
    swal("Hành động", " {!! session('message') !!}", "success", {
        button: "OK",
    })
</script>
@endif
@if(session('error'))
<script>
    swal("Hành động", " {!! session('error') !!}", "error", {
        button: "OK",
    })
</script>
@endif
<script>
    function deleteCate(id) {
        const url = '/cp-admin/blogs/delete/' + id;
        // console.log(url);
        swal({
                title: "Bạn có chắc không?",
                text: "Sau khi bị xóa, bạn sẽ không thể khôi phục tệp này! ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "get",
                        url: url,
                        success: function(res) {
                            //console.log(res.status)
                            if (res.status == 200) {
                                swal("Tệp của bạn đã bị xóa!", {
                                    icon: "success",
                                }).then(function() {
                                    $("#pro" + id).remove();
                                });
                            } else if (res.status == 401) {
                                swal(res.message, {
                                    icon: "error",
                                });
                            }
                        }
                    });

                } else {
                    swal("Tệp của bạn an toàn!!");
                }
            });
    }
    $(document).ready(function() {
        $(".page-link").on("click", function(e) {
            e.preventDefault();
            var rel = $(this).text();
            var page = parseInt(rel);
            // console.log( $("select[name='category_id']").val());
            $("input[name='page']").val(page);

            $("form[name='fillter_pro']").trigger("submit");
        });
        $("#fillter_pro").on("click", function(e) {
            e.preventDefault();
            $("input[name='page']").val(1);

            $("form[name='fillter_pro']").trigger("submit");
        });
    });
</script>
@endsection