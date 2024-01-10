@extends('client.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')



<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Số điện thoại</h4>
                    <p>{{$config->phone}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Địa chỉ</h4>
                    <p>{{$config->address}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Thời gian mở cửa</h4>
                    <p>10:00 đến 18:00 </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p>{{$config->email}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14892.634016654582!2d105.84077260000001!3d21.06633065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aa5872b4a417%3A0x4f6a06226e05b679!2zMjHCsDA0JzA3LjgiTiAxMDXCsDQ5JzQ2LjkiRQ!5e0!3m2!1svi!2s!4v1651687864957!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Việt Nam</h4>
            <ul>
                <li>Số điện thoại: {{$config->phone}}</li>
                <li>Địa chỉ: {{$config->address}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Liên hệ</h2>
                </div>
            </div>
        </div>
        <form action="{{route('sentContact')}}" method="post">
        @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="name" name="name" value="{{old('name')}}" placeholder="Nhập tên" require>
                    @error('name')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror

                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="email" name="email" value="{{old('email')}}" placeholder="Địa chỉ email" require >
                    @error('email')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror

                </div>
                <div class="col-lg-12 text-center">
                    <textarea name="description" placeholder="Nội dung liên hệ ">{{old('description')}}</textarea>
                    <button type="submit" class="site-btn">Giửi</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->

@endsection

@section('javascript')

@endsection