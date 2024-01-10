@extends('client.layout.client')
@section('title' , 'Tin tức')
@section('linkCss')
    {{-- <link rel="stylesheet" href="{{asset('client/css/new.css')}}"> --}}
@endsection
@section('main-content')
    <div class="update-new" style="margin-top:50px; margin-bottom:100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8">
                        <div class="new-main">
                            <h2><b>Tin tức</b></h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="card-group">
                                            <div class="card">
                                                <a href=""><img class="card-img-top" src="https://vnn-imgs-f.vgcloud.vn/2022/01/16/10/t1-240x160.jpg" alt="Card image cap"></a>
                                                <div class="card-body" style="width:240px;">
                                                    <a href=""><h4 class="card-title">Lượng trứng, sữa, trà nên dùng mỗi ngày</h4></a>
                                                    <a href="" class="web"><small style="margin-right: 10px">SỨC KHỎE</small> <small>18/04/2000</small></a>
                                                    <a href=""><p class="card-text" style="color: #656565;">Chúng ta có thể ăn bánh mì, trứng, chuối, uống sữa, trà mỗi ngày, 
                                                        nhưng đừng quên cân đối số lượng, không sử dụng quá nhiều.</p></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-group">
                                            <div class="card">
                                                <a href=""><img class="card-img-top" src="https://vnn-imgs-f.vgcloud.vn/2022/01/16/10/t1-240x160.jpg" alt="Card image cap"></a>
                                                <div class="card-body" style="width:240px;">
                                                    <a href=""><h4 class="card-title">Lượng trứng, sữa, trà nên dùng mỗi ngày</h4></a>
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
                    <div class="col-md-4">
                        <div class="new-feature">
                            <h4 style="margin-left:30px"><b>Bài viết nổi bật</b></h4>
                            <div class="card-group">
                                <div class="card">
                                    <div class="col-md-12" style="margin-bottom: 20px;">
                                        <div class="col-md-4">
                                            <a href=""><img class="card-img-top" src="https://vnn-imgs-f.vgcloud.vn/2022/01/16/10/t1-240x160.jpg" width="95px" alt="Card image cap"></a>                                      
                                        </div>
                                        <div class="col-md-8">
                                             <div class="card-body">
                                                <a href=""><h4 class="card-title" style="font-size: 16px;">Lượng trứng, sữa, trà nên dùng mỗi ngày</h4></a>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                                <div class="card">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <a href=""><img class="card-img-top" src="https://vnn-imgs-f.vgcloud.vn/2022/01/16/10/t1-240x160.jpg" width="95px" alt="Card image cap"></a>                                      
                                        </div>
                                        <div class="col-md-8">
                                             <div class="card-body">
                                                <a href=""><h4 class="card-title" style="font-size: 16px;">Lượng trứng, sữa, trà nên dùng mỗi ngày</h4></a>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
