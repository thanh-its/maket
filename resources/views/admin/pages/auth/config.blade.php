@extends('admin.master')
@section('title', "Thông tin cá nhân")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thông tin cấu hình</h1>
    <!-- <a href="{{route('cp-admin.category.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Danh mục</a> -->
</div>

    <div class="card shadow mb-4 col-12">
        <div class="card-body">
            <div class="table-responsive">
                <form class="user" action="{{ route('cp-admin.config') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="mt-3 " style="width: 100%; height: 100px; text-align: center; display: block; " id="imgavatar1">
                            <img src="{{ asset('storage/' . $config->logo) }}" style=" height: 100%;  border: 2px solid #a1a1a1;" alt="{{$config->fullname}}">
                        </div>
                        <div class="mt-3 " style="width: 100%; height: 100px; text-align: center; display: none; " id="imgavatar2">
                            <img style=" height: 100%;  border: 2px solid #a1a1a1;" id="previewimgavatar" alt="">
                        </div>
                        <input onchange="previewFile(this)" id="avatar_image" type="file" id="image" name="logo" class="form-control" require>
                        @error('logo')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ e-mail</label>
                        <input type="text" value="{{$config->email}}" name="email" class="form-control form-control-user">
                        @error('email')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="text" value="{{$config->phone}}" name="phone" class="form-control form-control-user">
                        @error('phone')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" value="{{$config->address}}" name="address" class="form-control form-control-user">
                        @error('address')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Liên kết facebook</label>
                        <input type="text" value="{{$config->link_facebook}}" name="link_facebook" placeholder="https://www.facebook.com/profile.php?id=100026987662342" class="form-control form-control-user">
                        @error('link_facebook')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Liên kết twitter</label>
                        <input type="text" value="{{$config->link_twitter}}" name="link_twitter" placeholder="https://www.twitter.com" class="form-control form-control-user">
                        @error('link_twitter')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Liên kết linkedin</label>
                        <input type="text" value="{{$config->link_linkedin}}" name="link_linkedin" placeholder="https://www.linkedin.com" class="form-control form-control-user">
                        @error('link_linkedin')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">Lưu lại</button>
                </form>
            </div>
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
<script src="{{asset('admin/js/slug.js')}}"></script>
<script>
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