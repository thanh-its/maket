@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Supplier
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
                    <form action="admin/supplier/add" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label>Supplier Name</label>
                            <input class="form-control" name="txtNameSupplier" placeholder="Please Enter Supplier Name" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="txtAddress" placeholder="Please Enter Address" />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="txtPhone" placeholder="Please Enter Phone" />
                        </div>
                        <button type="submit" class="btn btn-default">Supplier Add</button>
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