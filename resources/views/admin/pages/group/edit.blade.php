@extends('admin.master')
@section('title', "Nhóm khách hàng")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật nhóm khách hàng</h1>
    <a href="{{route('cp-admin.groups.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Nhóm khách hàng</a>
</div>

<div class="card shadow mb-4 ">
    <div class="card-body">
        <div class="table-responsive">
            <form class="user" action="{{ route('cp-admin.groups.update',[ 'id' => $GroupUser->id ]) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label for="nameCategories">Tên nhóm khách hàng<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="nameSupplier" value="{{ $GroupUser->name }}" name="name" id="nameCategories" placeholder="Tên nhà cung cấp ...">
                        @error('name')
                        <span class="text-danger">
                            {{$message}} 
                        </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Lưu lại</button>
            </form>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{asset('admin/js/slug.js')}}"></script>
<script>
    function previewFile(input) {
        var file = $("#product_image").get(0).files[0];
        console.log(file);
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewimg').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection