@extends('client.layout.client')
@section('title' , 'Thanh toán')
@section('linkCss')
    <link rel="stylesheet" href="{{asset('client/css/pay.css')}}">
@endsection
@section('main-content')
<div class="content-body" style="margin-top: 50px; margin-bottom:50px;">
    <main class="padding__header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" class="container-pay">
                        @csrf
                        <session class="form-pay-bg">
                            <h2>Thông tin thanh toán</h3>
                                <div class="form-pay">
                                    <div class="input-bg">
                                        <input type="text" name="name" value="" placeholder="Họ tên của bạn">
                                    </div>
                                    <div class="input-bg">
                                        <input type="email" name="email" value="" placeholder="Email của bạn">
                                    </div>
                                    <div class="input-bg">
                                        <input type="text" name="address" value="" placeholder="Địa chỉ : vd : Bắc Từ Liêm - Hà Nội">
                                    </div>
                                    <div class="input-bg">
                                        <input type="text" name="phone" value="" placeholder="Số điện thoại">
                                    </div>
                                    <div class="input-bg">
                                        <select name="address_detail">
                                            <option selected value="">Địa chỉ cụ thể</option>
                                            <option value="0">Nhà riêng</option>
                                            <option value="1">Văn phòng</option>
                                        </select>
                                        <select name="type_pay">
                                            <option selected value="">Hình thức</option>
                                            <option value="0">Thanh toán khi nhận hàng</option>
                                            <option value="1">Thanh toán qua số tài khoản</option>
                                        </select>
                                    </div>
                                    <div class="input-bg">
                                        <h5>Ghi chú đặt hàng (Tùy chọn)</h5>
                                        <textarea name="note" id="" class="input-note" placeholder="Ghi chú về đơn hàng"></textarea>
                                    </div>
                                </div>
                        </session>
                        <section class="info-receipt-bg">
                            <div class="receipt-bg">
                                <h3>Đơn hàng của bạn</h3>
                                <table class="table">
                                    <thead>
                                        <tr class="th-bg">
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Tạm tính</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="td-bg">
                                            <td scope="row"><span class="name-size"></span></td>
                                            <td>đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h3 class="sumMoney">Tổng tiền : <span>3.500.000 đ</span></h3>
                                <h4 class="pay-home">Trả tiền mặt khi nhận hàng</h4>
                                <p class="note-pay">Sau khi quý khách đặt hàng. Chúng tôi sẽ gửi thông tin đơn hàng qua
                                    Email và gọi điện xác
                                    nhận
                                    đơn hàng. Sau đó sẽ tiến hành vận chuyển hàng. Quý khách thanh toán khi nhận được hàng
                                </p>
                                <a href=""><button class="btn btn-success btn__pay" type="submit">Thanh toán</button></a>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
        
    </main>
</div>
@endsection
