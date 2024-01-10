@extends('client.layout.client')
@section('title' , 'Giỏ hàng')
@section('linkCss')
    <link rel="stylesheet" href="{{asset('client/css/cart.css')}}">
@endsection
@section('main-content')
    <div class="cart" style="margin-top:50px; margin-bottom:100px;">
        <div class="container">
            <div class="row">
                <h4>Giỏ hàng</h4>
                <div class="col-md-12 title-content-pro">
                    <div class="col-md-5">
                        <div class="title-cart">Sản phẩm</div>
                    </div>
                    <div class="col-md-2">
                        <div class="title-cart">Gía</div>
                    </div>
                    <div class="col-md-2">
                        <div class="title-cart">Số lượng</div>
                    </div>
                    <div class="col-md-2">
                        <div class="title-cart">Tổng</div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                <hr/>
                <div class="col-md-12 cart-pro-item">
                    <div class="col-md-5">
                        <a href="" class="product-image"><img width="75px" class="product-img" src="" alt=""></a>
                        <p class="nameProduct"></p>
                    </div>
                    <div class="col-md-2">
                        <div class="title-cart price">50.000</div>
                    </div>
                    <div class="col-md-2">
                        <div class="title-cart quanlity"><input maxlength="12" class="input-text qty" title="Qty" size="4" value="1" name="cart[15945][qty]"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="title-cart sumPrice">50000</div>
                    </div>
                    <div class="col-md-1">
                        <a onclick="return confirm('Bạn có muỗn xóa sản phẩm này ?')" href=""><i class="far fa-trash-alt"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="btn__table-cart">
                        <a class="continue__view" href=""> <i class="fas fa-arrow-left"></i> Tiếp tục xem sản phẩm</a>
                        <a class="update__cart" href=""><button class="btn btn-success">Cập nhật giỏ hàng</button></a>
                        <a class="btn-cart-empty" href=""><button class="btn btn-success">Tiến hành thanh toán</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection