@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tittle</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Source</th>
                            <th>Date_update</th>
                            <th>Description</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post as $value)
                           <tr align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->image}}</td>
                                <td>{{$value->content}}</td>
                                <td>{{$value->source}}</td>
                                <td>{{$value->date_update}}</td>
                                <td>{{$value->description}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/delete/{{$value->id}}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/edit/{{$value->id}}">Edit</a></td>                           
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