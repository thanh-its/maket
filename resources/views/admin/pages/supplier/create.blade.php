@extends('admin.master')
@section('title', "Nhà cung cấp")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm nhà cung cấp</h1>
    <a href="{{route('cp-admin.supplier.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Nhà cung cấp</a>
</div>

<div class="card shadow mb-4 ">
    <div class="card-body">
        <div class="table-responsive">
            <form class="user" action="{{ route('cp-admin.supplier.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nameCategories">Tên nhà cung cấp<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="nameSupplier" value="{{ old('nameSupplier') }}" name="nameSupplier" id="nameCategories" placeholder="Tên nhà cung cấp ...">
                        @error('nameSupplier')
                        <span class="text-danger">
                            {{$message}} 
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="slugCategories">Địa chỉ<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user " id="address" value="{{ old('address') }}" name="address" id="slugCategories" placeholder="Địa chỉ ...">
                        @error('address')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nameCategories">Số điện thoại<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="phone" value="{{ old('phone') }}" name="phone" id="nameCategories" placeholder="Số điện thoại ...">
                        @error('phone')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                    <label for="slugCategories">Trạng thái<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="status" id="inputGroupSelect01">
                            <option selected value="1">Đang hoạt động</option>
                            <option value="0">Ngưng hoạt động</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror   
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