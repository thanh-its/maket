@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                {{-- <form action="admin/layout/user/search" method="POST" class="navbar-form navbar-left" role="search">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <input type="text" name="key" class="form-control" placeholder="Tìm kiếm">
                    </div>
                </form> --}}
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Tài khoản</th>
                            <th>Nhóm</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $value)
                            <tr class="odd gradeX" align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->fullname}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->phone}}</td>
                                <td><span class="badge badge-md {{$value->status==App\Common\Constants::ENABLED ? 'badge-success' : 'badge-danger' }}">
                                    {{ App\Common\Constants::STATUS_CUSTOMER[$value->status]}}
                                </span>
                                </td>
                                <td>{{ App\Common\Constants::ROLE[$value->role]}}
                                   
                                </td>
                                <td class="center"> 
                                <a href="admin/user/edit/{{$value->id}}">
                                    <i class="fa fa-pencil fa-fw"></i>
                                </a>
                                    <a href="admin/user/delete/{{$value->id}}">
                                        <i class="fa fa-trash fa-fw"></i>
                                    </a>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    
    <style>
.badge.badge-success {
    background-color: #4caf50;
}
.badge.badge-danger {
    background-color: red;
}
.badge.badge-md {
    padding: 3px 10px;
}

.badge {
    border-radius: 50px;
    color: #fff;
    padding: 8px;
    white-space: nowrap;
}
    </style>
    <!-- /#page-wrapper -->
@endsection
