@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sale
                        <small>Add</small>
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
                    <form action="admin/sale/add" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label>Number Sale</label>
                            <input class="form-control" name="txtNumberSale" placeholder="Please Enter Number Sale" />
                        </div>
                        <div class="form-group">
                            <label>Discount Percent</label>
                            <input class="form-control" name="txtDiscount" placeholder="Please Enter Discount Percent" />
                        </div>
                        <div class="form-group">
                            <label>Active</label>
                            @if($sale->status == 1)
                                <label class="radio-inline">
                                 <input name="active" value="Còn hiệu lực" checked="" type="radio">Còn hiệu lực
                                </label>
                            @else
                                <label class="radio-inline">
                                    <input name="active" value="Hết hiệu lực" type="radio">Hết hiệu lực
                                </label>
                            @endif                 
                        </div>
                        <div class="form-group">
                            <label>Time Start</label>
                            <input class="form-control" name="txtStart" placeholder="Please Enter Time Start " />
                        </div>
                        <div class="form-group">
                            <label>Time End</label>
                            <input class="form-control" name="txtFinish" placeholder="Please Enter Time End" />
                        </div>
                        <button type="submit" class="btn btn-default">Sale Add</button>
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