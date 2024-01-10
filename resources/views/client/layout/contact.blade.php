@extends('client.layout.client')
@section('title' , 'Liên hệ')
@section('linkCss')
    <link rel="stylesheet" href="{{ asset('client/css/contact.css') }}">
@endsection
@section('main-content')
<main class="content ">
    <section class="address">
        <h3 class="address__title">Liên hệ với chúng tôi</h3>
        <h4 class="address__name-shop">Freshio Organic Store</h4>
        <p class="address__description">Freshio Organic Store - cửa hàng chuyên cung cấp thực phẩm sạch cho mọi nhà!!!</p>
        <ul class="address__list">
            <li class="address__item">
                <i class="fas fa-map-marker-alt"></i>
                <span class="address__span">Địa chỉ :</span>Tâng 6 toà nhà Ladeco, 266 Đội Cấn, phường Liễu Giai, Hà Nội
            </li>
            <li class="address__item">
                <i class="fas fa-mobile-alt"></i>
                <span style="margin-left: 8px;" class="address__span">Hotline :</span><a href="">(0866) 940 524</a>
            </li>
            <li class="address__item">
                <i class="fas fa-envelope"></i>
                <span>Email: </span>thutrangk2000@gmail.com
            </li>
        </ul>
        </ul>
    </section>
    <section class="form__contact">
        <h3 class="address__title">Gửi thông tin ý kiến phản hồi</h3>
        <p class="form__contact-text">Mọi ý kiến đóng góp, liên hệ, khiếu nại khác vui lòng điền đầy đủ thông
            tin và gửi đến chúng tôi.
            Bộ phận hỗ trợ khách hàng sẽ phản hồi sớm nhất khi nhận được thông tin.</p>

        <form class="form-contact" action="">
            <input type="text" class="form-import" placeholder="Họ và tên">
            <br>
            <input type="text" class="form-import" placeholder="Số điện thoại">
            <br>
            <input type="email" class="form-import" placeholder="Địa chỉ email">
            <br>
            <div class="input__radio-bg">
                <input type="radio" checked name="service"> Than phiền
                <input type="radio" name="service"> Góp ý
                <input type="radio" name="service"> Tư vẫn
                <input type="radio" name="service"> Mua hàng
                <input type="radio" name="service"> Khác
            </div>
            <input type="email" class="form-import" placeholder="Tiêu đề">
            <textarea name="" id="" placeholder="Nội dung" class="content-import" cols="30" rows="7"></textarea>
            <button type="button" class="btn btn-success">Gửi tin nhắn</button>
        </form>
    </section>
</main>
@endsection
