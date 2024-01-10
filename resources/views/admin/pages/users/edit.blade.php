@extends('admin.master')
@section('title', "Cập nhân viên")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhân viên</h1>
    <a href="{{route('cp-admin.user.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Nhân viên</a>
</div>
<form class="d-flex justify-content-between" action="{{ route('cp-admin.user.update',[ 'id' => $users->id ]) }}" method="POST" enctype="multipart/form-data">
    <div class="card shadow mb-4  col-8">
        <div class="card-body">
            <div class="table-responsive">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="fullname">Họ và tên<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="fullname" value="{{ old('fullname', $users->fullname ?? null) }}" name="fullname" placeholder="Họ và tên ...">
                        @error('fullname')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="slugCategories">E-mail<span class="text-danger">(*)</span></label>
                        <input type="email " class="form-control form-control-user " id="email" value="{{ old('email', $users->email ?? null) }}" name="email" id="emailCategories" placeholder="Email ...">
                        @error('email')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="quantity">Số điện thoại<span class="text-danger">(*)</span></label>
                        <input type="phone" class="form-control form-control-user" id="phone" value="{{ old('phone', $users->phone ?? null) }}" name="phone" id="phone" placeholder="Số điện thoại liên hệ ...">
                        @error('phone')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="slugCategories">Địa chỉ<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user " id="address" value="{{ old('address', $users->address ?? null) }}" name="address" id="addressCategories" placeholder="Địa chỉ thường trú ...">
                        @error('address')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row ">
                    <div class=" col-sm-6 ">
                        <label for="slugCategories">Chức vụ<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="role_id" id="inputGroupSelect01">
                            <option >Choose...</option>
                            @foreach($roles as $role)
                            <option {{ $users->role_id == $role->id ? "selected": "" }} value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="slugCategories">Trạng thái<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="status" id="inputGroupSelect01">
                        <option {{ $users->status == 1 ? "selected": "" }} value="1">Đang hoạt động</option>
                            <option {{ $users->status == 0 ? "selected": "" }} value="0">Ngưng hoạt động</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-sm-12">
                        <label for="slugCategories"> Ảnh đại diện<span class="text-danger">(*)</span></label>
                        <input onchange="previewFile(this)" id="avatar_image" type="file" id="image" name="avatar" class="form-control" require>
                        @error('avatar')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Lưu lại</button>
            </div>
        </div>
    </div>
    <div class="card  col-3">
        <div class="card-body">
            <div class="table-responsive">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <div class="col-sm-12">
                        <div class="mt-3 " style="width: 100%; height: 150px; text-align: center; display: block; " id="imgavatar1">
                            <img src="{{ asset('storage/' . $users->avatar) }}" style=" width: 100%;  border: 2px solid #a1a1a1;" alt="{{$config->fullname}}">
                        </div>
                        <div class="mt-3 " style="width: 100%; height: 150px; text-align: center; display: none; " id="imgavatar2">
                            <img style=" width: 100%;  border: 2px solid #a1a1a1;" id="previewimgavatar" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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
    function previewFile(input) {
        var file = $("#avatar_image").get(0).files[0];
        $("#imgavatar2").css("display", "block");
        $("#imgavatar1").css("display", "none");
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