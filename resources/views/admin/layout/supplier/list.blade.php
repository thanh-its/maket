@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Supplier
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Supplier's name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supplier as $value)
                           <tr align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->nameSupplier}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->phone}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/supplier/delete/{{$value->id}}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/supplier/edit/{{$value->id}}">Edit</a></td>                           
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection