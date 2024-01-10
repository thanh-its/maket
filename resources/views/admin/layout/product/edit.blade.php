@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>{{$product->namePro}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/product/edit/{{$product->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label>Supplier</label>
                            <select name="supplier" class="form-control">
                                @foreach($supplier as $value)
                                    <option 
                                    @if($product->supplier_id==$value->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$value->id}}">{{$value->nameSupplier}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                @foreach($category as $value)
                                    <option 
                                    @if($product->category_id==$value->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$value->id}}">{{$value->nameCate}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Product's name</label>
                            <input class="form-control" name="txtName" placeholder="Please Enter Product's name" value="{{$product->namePro}}"/>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" value="{{$product->image}}"/>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input class="form-control" name="txtQuantity" placeholder="Please Enter Product's quantity" value="{{$product->quantity}}"/>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="txtPrice" placeholder="Please Enter Product's price" value="{{$product->price}}"/>
                        </div>
                        <div class="form-group">
                            <label>Product's status</label>
                            <label class="radio-inline">
                                <input name="status" value="1"
                                @if($product->status==1)
                                {{"checked"}}
                                @endif
                                type="radio">Còn hàng
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="2"
                                @if($product->status==2)
                                {{"checked"}}
                                @endif
                                type="radio">Hết hàng
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Product Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection