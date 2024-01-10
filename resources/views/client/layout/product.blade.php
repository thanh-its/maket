<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('client/css/product.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&family=Rubik:wght@300&display=swap" rel="stylesheet">
    @yield('linkCss')
	<link rel="stylesheet" href="{{asset('client/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/introshop.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/product.css')}}">
    <title>Sản phẩm</title>
</head>
<body>
    @include('client.divide.header')
    @include('client.layout.carousel')
    {{-- product --}}
    <div class="list-product" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title-main text-center" style="margin-top: 40px;margin-bottom:30px; font-size:35px;font-weight:600;font-family: Poppins, Arial, sans-serif;">Danh sách sản phẩm</h2>
                </div>
                <div class="col-md-12">
                    {{-- <div class="filter_product-bg">
                        <p class="sum__product-page">Showing 1–40 of 114 results</p>
                        <select class="filter__product" name="" id="select-filter">
                            <option value="1">Mới nhất</option>
                            <option value="2">Theo giá : từ cao đến thấp</option>
                            <option value="3">Theo giá : từ thấp đến cao</option>
                        </select>
                    </div> --}}
                    <div class="category-product">
                        <ul class="nav nav-pills" role="tablist">
                            {{-- <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#home">Danh mục sản phẩm</a>
                            </li> --}}
                            <li class="nav-item active">
                              <a class="nav-link" data-toggle="pill" href="#home">Tất cả</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="pill" href="#menu1">Củ quả các loại</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="pill" href="#menu2">Rau các loại</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#menu2">Thực phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#menu2">Trái cây</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#menu2">Gia vị món ăn</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    {{-- <div class="col-md-3">
                        <div class="category-product">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#home">Danh mục sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#home">Tất cả</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu1">Củ quả các loại</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="pill" href="#menu2">Rau các loại</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu2">Thực phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#menu2">Trái cây</a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    {{-- <h2><b>Danh sách sản phẩm</b></h2>
                    <hr> --}}
                    <div class="col-md-3">
                        <div class="card-group">
                            <div class="card list-product">
                                <a href=""><img class="card-img-top img-fluid" src="https://webmaudep.com/demo/thucpham/tp01/images/product-1.jpg" alt="Vegetable"></a>
                                <div class="card-body" style="width:240px;">
                                    <span class="status">30%</span>
                                    <div class="overlay"></div>
                                    <div class="info-product">
                                        <h3><a href="">ỚT NGỌT</a></h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                <p class="price"><span class="mr-2 price-dc">35.000đ</span></p>
                                            </div>
                                        </div>
                                        <a href="">
                                            <div class="add-cart">
                                                <i class="fa fa-shopping-basket"></i>
                                                <span>Thêm</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <ul class="page__paging-list">
                        <li class="page__paging-item"><a href="">1</a></li>
                        <li class="page__paging-item"><a href="">2</a></li>
                        <li class="page__paging-item"><a href="">3</a></li>
                        <li class="page__paging-item"><a href="">4</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- end product --}}
    @include('client.divide.footer')
</body>
</html>

