@extends('admin.master')
@section('title', "Danh mục bài viết")
@section('style')
<style>
    .sreach {
        border: 1px solid black !important;
    }
</style>
@endsection
@section('content')
<div  class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh mục bài viết</h1>
    @can('THEM-LOAI-BAI-VIET')
    <a href="{{route('cp-admin.cate_blog.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Thêm danh mục </a>
    @endcan
</div>

<div class="card shadow mb-4 ">
    <div class="card-header py-3">
        <form name="fillter_cate" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="get">
            <div class="input-group">
            <input type="hidden" class="form-control bg-light border-0 small sreach" name="page" value="{{request('page') ? request('page') : '1' }}" aria-label="Search" aria-describedby="basic-addon2">
                <input type="text" class="form-control bg-light border-0 small sreach" name="search" placeholder="Tìm danh mục bài viết ..." value="{{request('search') ? request('search') : '' }}" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="fillter_cate" type="btn">
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
                        <th>Tên danh mục</th>
                        <th>Sô lượng bài viết</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Sô lượng bài viết</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach( $categoryBlogs as $categoryBlog)
                    <tr id="cate{{ $categoryBlog->id }}">
                        <td>{{ $categoryBlog->id }}</td>
                        <td>{{ $categoryBlog->name }}</td>
                        <td>{{ $categoryBlog->blogs->count() }}</td>
                        <td>
                        @can('SUA-LOAI-BAI-VIET')
                            <a href="{{route('cp-admin.cate_blog.edit',[ 'id' => $categoryBlog->id ])}}" class="btn-lg"><i class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('XOA-LOAI-BAI-VIET')
                            <a class="btn-lg" onclick="deleteCate({{ $categoryBlog->id}})"><i class="fas fa-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-header py-3">
        {!! $categoryBlogs->links('pagination::bootstrap-4') !!}
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
<script>
    function deleteCate(id) {
        const url = '/cp-admin/cate_blog/delete/' + id;
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
                            console.log(res.status)
                            if (res.status == 200) {
                                swal("Tệp của bạn đã bị xóa!", {
                                    icon: "success",
                                }).then(function() {
                                    $("#cate" + id).remove();
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
            $("input[name='page']").val(page);

            $("form[name='fillter_cate']").trigger("submit");
        });
        $("#fillter_cate").on("click", function(e) {
            e.preventDefault();
            $("input[name='page']").val(1);

            $("form[name='fillter_cate']").trigger("submit");
        });
    });
</script>
@endsection