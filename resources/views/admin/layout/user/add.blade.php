@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
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
                    <form action="admin/user/add" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label for="">Avatar</label>
                            <input type="file" class="form-control"  id="avatar" name="avatar" required />
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="txtUser" placeholder="Please Enter Username" />
                        </div>
                        <div class="form-group">
                            <label>Fullname</label>
                            <input class="form-control" name="txtFullname" placeholder="Please Enter Fullname" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                        </div>
                        <div class="form-group">
                            <label>RePassword</label>
                            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="txtAddress" placeholder="Please Enter Address" />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="txtPhone" placeholder="Please Enter Phone" />
                        </div>
                        <div class="form-group">
                            <label>Role User</label>
                            <label class="radio-inline">
                                <input name="role" value="Admin" checked="" type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="role" value="User" type="radio">User
                            </label>
                            <label class="radio-inline">
                                <input name="role" value="User" type="radio">Khách hàng
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Status User</label>
                            <label class="radio-inline">
                                <input name="status" value="Đang hoạt động" checked="" type="radio">Đang hoạt động
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="Không hoạt động" type="radio">Không hoạt động
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">User Add</button>
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