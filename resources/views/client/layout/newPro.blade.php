@extends('client.layout.client')
@section('title' , 'Trang chủ')
@section('linkCss')
    <link rel="stylesheet" href="{{ asset('client/css/newpro.css') }}">
@endsection
@section('main-content')
<div class="category-product-1" style="margin-top: 60px; margin-bottom:60px;">
  <div class="container">
      <div class="row">
          <div class="content-new-pro">
            <div class="col-md-12">
              <div class="navbar nav-menu">
                <div class="navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" data-toggle="pill" href="#tab-1">Sản phẩm nổi bật</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#tab-2">Sản phẩm mới</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#tab-3">Sản phẩm khuyến mãi</a>
                    </li>
                    {{-- <li><a data-toggle="tab" data-bs-toggle="tab" href="#tab-1" class="active">Hot Products</a></li>
                    <li class=" "><a data-toggle="tab" data-bs-toggle="tab" href="#tab-2" class="">New Arrivals</a></li>
                    <li class=""><a data-toggle="tab" data-bs-toggle="tab" href="#tab-3">Todays Deals</a></li> --}}
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="product-bestseller">
                <div class="tab-banner active" id="tab-1">
                    <div class="product-new"> 
                      <div class="item col-md-3">
                          <div class="card border-primary">
                            <a href=""><img class="card-img-top" src="https://themesground.com/agrifarm-demo/V1/products-images/product8.jpg" alt=""></a>
                            <div class="card-body">
                              <a href=""><h4 class="card-title"><a>Đậu quả</a></h4></a>
                              <hr>
                              <div class="star-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </div>
                              <p class="card-text item-content">
                                  <div class="item-content">
                                      <div class="item-price">
                                        <div class="price-box"> <span class="regular-price"> <span class="price">45.000đ</span> </span> </div>
                                      </div>
                                      <div class="action">
                                        <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i> Add</button>
                                      </div>
                                  </div>
                              </p>
                            </div>
                          </div>
                      </div>
                      <div class="item col-md-3">
                          <div class="card border-primary">
                            <img class="card-img-top" src="https://themesground.com/agrifarm-demo/V1/products-images/product8.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title">Đậu quả</h4>
                              <div class="star-rating"></div>
                              <p class="card-text item-content">
                                  <div class="item-content">
                                      <div class="item-price">
                                        <div class="price-box"> <span class="regular-price"> <span class="price">45.000đ</span> </span> </div>
                                      </div>
                                      <div class="action">
                                        <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i> Add</button>
                                      </div>
                                  </div>
                              </p>
                            </div>
                          </div>
                      </div>
                      <div class="item col-md-3">
                          <div class="card border-primary">
                            <img class="card-img-top" src="https://themesground.com/agrifarm-demo/V1/products-images/product8.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title"><a>Đậu quả</a></h4>
                              <div class="star-rating"></div>
                              <p class="card-text item-content">
                                  <div class="item-content">
                                      <div class="item-price">
                                        <div class="price-box"> <span class="regular-price"> <span class="price">45.000đ</span> </span> </div>
                                      </div>
                                      <div class="action">
                                        <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i> Add</button>
                                      </div>
                                  </div>
                              </p>
                            </div>
                          </div>
                      </div>
                      <div class="item col-md-3">
                          <div class="card border-primary">
                            <img class="card-img-top" src="https://themesground.com/agrifarm-demo/V1/products-images/product8.jpg" alt="">
                            <div class="card-body">
                              <h4 class="card-title">Đậu quả</h4>
                              <div class="star-rating"></div>
                              <p class="card-text item-content">
                                  <div class="item-content">
                                      <div class="item-price">
                                        <div class="price-box"> <span class="regular-price"> <span class="price">45.000đ</span> </span> </div>
                                      </div>
                                      <div class="action">
                                        <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i> Add</button>
                                      </div>
                                  </div>
                              </p>
                            </div>
                          </div>
                      </div>
                    {{-- </div> end product new --}}
                </div>
                <div class="tab-banner active" id="tab-2"></div>
                <div class="tab-banner active" id="tab-3"></div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div> 
{{-- end category-product-1 --}}
<div class="ads-block" style="margin-top: 50px;">
  <div class="container">
    <div class="row">
      <div class="banner-text-big">
        Save 40% on Fresh Vegetables 
        <br>
        Store Available!!
      </div>
      <div class="banner-text-normal">
        <a href="">Freshio Organic Store</a>
      </div>
    </div>
  </div>
</div>
{{-- ADS-BLOCK --}}
<section class="deals-block">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Deal of the day</h2>
        <div class="hot-deal">
          <div class="col-md-3 item">
            <div class="card border-primary"> 
              <a href=""><img class="card-img-top" src="https://themesground.com/agrifarm-demo/V1/products-images/product8.jpg" width="100%" alt=""></a>
              <div class="card-body">
                <a><h4 class="card-title">Đậu quả</h4></a>
                <hr>
                <div class="star-rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p class="card-text item-content">
                    <div class="item-content">
                        <div class="item-price">
                          <div class="price-box"> <span class="regular-price"> <span class="price">45.000đ</span> </span> </div>
                        </div>
                        <div class="action">
                          <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i> Add</button>
                        </div>
                    </div>
                </p>
              </div>
            </div><div class="card border-primary"> 
              <a href=""><img class="card-img-top" src="https://themesground.com/agrifarm-demo/V1/products-images/product8.jpg" width="100%" alt=""></a>
              <div class="card-body">
                <a><h4 class="card-title">Đậu quả</h4></a>
                <hr>
                <div class="star-rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p class="card-text item-content">
                    <div class="item-content">
                        <div class="item-price">
                          <div class="price-box"> <span class="regular-price"> <span class="price">45.000đ</span> </span> </div>
                        </div>
                        <div class="action">
                          <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i> Add</button>
                        </div>
                    </div>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card border-primary"> 
              <a href=""><img class="card-img-top" src="https://themesground.com/agrifarm-demo/V1/products-images/product8.jpg" width="100%" alt=""></a>
              <div class="card-body">
                <a><h4 class="card-title">Đậu quả</h4></a>
                <hr>
                <div class="star-rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p class="card-text item-content">
                    <div class="item-content">
                        <div class="item-price">
                          <div class="price-box"> <span class="regular-price"> <span class="price">45.000đ</span> </span> </div>
                        </div>
                        <div class="action">
                          <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i> Add</button>
                        </div>
                    </div>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card border-primary"> 
              <a href=""><img class="card-img-top" src="https://themesground.com/agrifarm-demo/V1/products-images/product8.jpg" width="100%" alt=""></a>
              <div class="card-body">
                <a><h4 class="card-title">Đậu quả</h4></a>
                <hr>
                <div class="star-rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p class="card-text item-content">
                    <div class="item-content">
                        <div class="item-price">
                          <div class="price-box"> <span class="regular-price"> <span class="price">45.000đ</span> </span> </div>
                        </div>
                        <div class="action">
                          <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i> Add</button>
                        </div>
                    </div>
                </p>
              </div>
            </div>
            <div class="card border-primary"> 
              <a href=""><img class="card-img-top" src="https://themesground.com/agrifarm-demo/V1/products-images/product8.jpg" width="100%" alt=""></a>
              <div class="card-body">
                <a><h4 class="card-title">Đậu quả</h4></a>
                <hr>
                <div class="star-rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
                <p class="card-text item-content">
                    <div class="item-content">
                        <div class="item-price">
                          <div class="price-box"> <span class="regular-price"> <span class="price">45.000đ</span> </span> </div>
                        </div>
                        <div class="action">
                          <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><i class="fa fa-shopping-basket"></i> Add</button>
                        </div>
                    </div>
                </p>
              </div>
            </div>
          </div>

          </div>
        </div> 
        {{-- end hot-deal --}}
      </div>
    </div>
  </div>
</section>
{{-- end section deals-block --}}
<section class="article-new-1" style="margin-top: 80px; margin-bottom:60px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-4"><div class="speration"></div></div>
        <div class="col-md-4"><div class="article-title-new">Bài viết mới nhất</div></div>
        <div class="col-md-4"><div class="speration"></div></div>
      </div>
      <div class="col-md-12">
        <div class="block-new-1">
        <div class="col-md-4">
          <div class="card-group">
            <div class="card">
                <a href=""><img class="card-img-top" src="https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/image-13-copyright-min-410x250.jpg" alt="Card image cap"></a>
                <div class="card-body" style="width:240px;">
                    <a href=""><h4 class="card-title">5 lý do bạn phải ăn rau xanh mỗi ngày</h4></a>
                    <a href="" class="web"><small style="margin-right: 10px">SỨC KHỎE</small> <small>18/04/2000</small></a>
                    <a href=""><p class="card-text" style="color: #656565;">Chúng ta có thể ăn bánh mì, trứng, chuối, uống sữa, trà mỗi ngày, 
                        nhưng đừng quên cân đối số lượng, không sử dụng quá nhiều.</p></a>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
          <div class="card-group">
            <div class="card">
                <a href=""><img class="card-img-top" src="https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/image-13-copyright-min-410x250.jpg" alt="Card image cap"></a>
                <div class="card-body" style="width:240px;">
                    <a href=""><h4 class="card-title">5 lý do bạn phải ăn rau xanh mỗi ngày</h4></a>
                    <a href="" class="web"><small style="margin-right: 10px">SỨC KHỎE</small> <small>18/04/2000</small></a>
                    <a href=""><p class="card-text" style="color: #656565;">Chúng ta có thể ăn bánh mì, trứng, chuối, uống sữa, trà mỗi ngày, 
                        nhưng đừng quên cân đối số lượng, không sử dụng quá nhiều.</p></a>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
          <div class="card-group">
            <div class="card">
                <a href=""><img class="card-img-top" src="https://demo2wpopal.b-cdn.net/freshio/wp-content/uploads/2020/08/image-13-copyright-min-410x250.jpg" alt="Card image cap"></a>
                <div class="card-body" style="width:240px;">
                    <a href=""><h4 class="card-title">5 lý do bạn phải ăn rau xanh mỗi ngày</h4></a>
                    <a href="" class="web"><small style="margin-right: 10px">SỨC KHỎE</small> <small>18/04/2000</small></a>
                    <a href=""><p class="card-text" style="color: #656565;">Chúng ta có thể ăn bánh mì, trứng, chuối, uống sữa, trà mỗi ngày, 
                        nhưng đừng quên cân đối số lượng, không sử dụng quá nhiều.</p></a>
                </div>
            </div>
        </div>
      </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection