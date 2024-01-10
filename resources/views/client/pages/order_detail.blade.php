@extends('client.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table" style="background: #f5f5f5;">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Số tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Orders->order_detail as $Order)
                            <tr>
                                <td>
                                    <img src="img/cart/cart-1.jpg" alt="">
                                    <h5>{{$Order->name}}</h5>
                                </td>
                                <td>
                                    <h5> {{ number_format($Order->price, 0, ',', '.') . " VNĐ"   }}</h5>
                                </td>
                                <td>
                                    <h5> {{$Order->quantity}}</h5>
                                </td>
                                <td>
                                    <h5> {{ number_format($Order->price * $Order->quantity, 0, ',', '.') . " VNĐ"   }}</h5>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Hóa đơn</h5>
                    <ul>
                        <li>Tổng tiền thanh toán <span>{{ number_format($totalMoney, 0, ',', '.') . " VNĐ"   }}</span></li>
                        <li>Phương thức thanh toán <span>Thanh toán khi nhân hàng</span></li>
                        <li>Trạng thái <span>{{ App\Common\Constants::STATUS_ORDER[$Orders->status] }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Thông tin giao hàng</h5>
                    <ul>
                        <li>Tên khách hàng <span>{{$Orders->fullname}}</span></li>
                        <li>Số điện thoại <span>{{$Orders->phone}}</span></li>
                        <li>Địa chỉ giao hàng <span>{{$Orders->address}}</span></li>
                        <li>Ghi chú  <span>{{$Orders->note}}</span></li>
                    </ul>
                </div>
            </div>
        </div>

       
    </div>
</section>
<!-- Shoping Cart Section End -->


@endsection

@section('javascript')
<script>
    $("#submit-updateCarts").on("click", function(e) {
        $("form[name='updateCarts']").trigger("submit");
    });
    $("#checkout").on("click", function(e) {
        $("form[name='checkout']").trigger("submit");
    });
</script>
@endsection