@extends('admin.master')
@section('title', "Khách hàng")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin khách hàng</h1>
    <a href="{{route('cp-admin.customers.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Danh sách khách hàng</a>
</div>

<div class="card shadow mb-4 ">
    <div class="card-body">
        <div class="table-responsive">
            <form  action="{{ route('cp-admin.customers.update',[ 'id' => $users->id ]) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="fullname">Tên <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="fullname" value="{{ $users->fullname }}" disabled placeholder="Tên sản phẩm ...">
                    </div>
                    <div class="col-sm-4">
                        <label for="slugCategories">E-mail<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user " id="email " value="{{ $users->email  }}" disabled id="slugCategories" placeholder="Slug sản phẩm ...">
                    </div>
                    <div class="col-sm-4">
                        <label for="slugCategories">Số điện thoại<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user " id="phone" value="{{ $users->phone }}" disabled id="slugCategories" placeholder="Slug sản phẩm ...">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="fullname">Địa chỉ<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="fullname" value="{{ $users->address_detail }}" name="address_detail" placeholder="Tên sản phẩm ...">
                        @error('address_detail')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="slugCategories">Địa chỉ chi tiết<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user " id="slugs" value="{{ $users->address	 }}" name="address" id="slugCategories" placeholder="Slug sản phẩm ...">
                        @error('address')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="slugCategories">Trạng thái<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="status" id="inputGroupSelect01">
                            <option {{ $users->status == 1 ? "selected": "" }} value="1">Đang hoạt động</option>
                            <option {{ $users->status == 0 ? "selected": "" }} value="0">Ngưng hoạt động</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="col-sm-6">
                    <label for="slugCategories">Nhóm khách hàng<span class="text-danger">(*)</span></label>
                        <select id="inputState" name="group_user"  class="custom-select">
                            @foreach($GroupUsers as $GroupUser)
                            <option value="{{$GroupUser->id}}" {{$users->status == $GroupUser->id ? "selected" : "" }}>{{$GroupUser->name }}</option>
                            @endforeach
                        </select>
                        @error('group_user')<span class="text-danger">{{$message}}</span>@enderror
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
        var file = $("#users_image").get(0).files[0];
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