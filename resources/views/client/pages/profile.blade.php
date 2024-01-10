@extends('client.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')

<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="padding: 5%;background-color: #76717166;">
                <div class="contact__form__title">
                    <div class="mt-3 " style="width: 100%; height: 100px; text-align: center; display: block; " id="imgavatar1">
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" style="width: 100px; height: 100%;  border-radius: 50%; border: 2px solid #a1a1a1;" alt="{{auth()->user()->fullname}}">
                    </div>
                    <div class="mt-3 " style="width: 100%; height: 100px; text-align: center; display: none; " id="imgavatar2">
                        <img style="width: 100px; height: 100%;  border-radius: 50%; border: 2px solid #a1a1a1;" id="previewimgavatar" alt="">
                    </div>
                </div>
                <form action="{{route('UpdateProfile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-5">
                            <input type="name" name="fullname" value="{{ old('fullname', auth()->user()->fullname ?? null) }}" placeholder="Nhập tên..." require>
                            @error('fullname')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror

                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 ">
                            <input type="phone" name="phone" value="{{ old('phone', auth()->user()->phone ?? null) }}" placeholder="Số điện thoại..." require>
                            @error('phone')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror

                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 ">
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email ?? null) }}" placeholder="Nhập địa chỉ email..." require>
                            @error('email')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror

                        </div>
                        <div class="col-lg-6 col-md-6 mb-5 ">
                            <input type="address" name="address" value="{{ old('address', auth()->user()->address ?? null) }}" placeholder="Địa chỉ..." require>
                            @error('address')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror

                        </div>
                        <div class="col-lg-12 text-center mb-5">
                            <input onchange="previewFile(this)" id="avatar_image" type="file"  name="avatar" class="form-control" require>
                            @error('avatar')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="site-btn">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Contact Form End -->
<style>
    .contact-form form input {
    margin-bottom: 0px !important;
}
</style>
@endsection

@section('javascript')
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