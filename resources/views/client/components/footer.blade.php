    <!-- Footer Section Begin -->
    <footer class="footer spad" style="height:350px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{route("home")}}}" style="width:153px; height:100px;margin-left:10px;"><img src="{{ asset('storage/' . $config->logo) }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: {{$config->address}}</li>
                            <li>Số điện thoại: {{$config->phone}}</li>
                            <li>E-mail: {{$config->email}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Các liên kết</h6>
                        <ul>
                            <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li><a href="{{ route('blogs') }}">Bài viết</a></li>
                            <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                            <li><a href="{{ route('order') }}">Đơn hàng</a></li>
                        </ul>
                        <!-- <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia bản tin của chúng tôi ngay bây giờ</h6>
                        <p>Nhận thông tin cập nhật qua E-mail về cửa hàng
                            mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                        <form action="#">
                            <input type="text" placeholder="Nhập địa chỉ e-mail">
                            <button type="submit" class="site-btn">Đăng ký</button>
                        </form>
                        <!-- <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- Footer Section End -->