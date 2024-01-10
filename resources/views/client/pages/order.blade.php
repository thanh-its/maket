@extends('client.master')
@section('title', 'Siêu thị thực phẩm')
@section('content')

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="">Đơn hàng</th>
                                    <th>Tình trạng</th>
                                    <th>Ngày</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Orders as $Order )
                                <tr>
                                    <td class="shoping__cart__item__close ">
                                        <span>{{$Order->id}}</span>
                                    </td>
                                    <td class="shoping__cart__item__close ">
                                   <span> {{ App\Common\Constants::STATUS_ORDER[$Order->status] }}</span>
                                    </td>
                                    <td class="shoping__cart__item__close ">
                                   <span> {{$Order->created_at}}</span>
                                    </td>
                              
                                    <td class="shoping__cart__item__close d-flex justify-content-center">
                                       
                                        <a type="button"class="btn btn-primary" href="{{route('order_detail',['id'=>$Order->id])}}">Xem</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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