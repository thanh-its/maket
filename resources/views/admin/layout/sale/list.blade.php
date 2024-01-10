@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sale
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Number_sale</th>
                            <th>Discount_percent(%)</th>
                            <th>Active</th>
                            <th>Time_start(h)</th>
                            <th>Time_end(h)</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sale as $value)
                           <tr align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->number_sale}}</td>
                                <td>{{$value->discount_percent}}</td>
                                <td>{{$value->active}}
                                    @if($value->active==1)
                                    {{"Có hiệu lực"}}
                                    @else
                                    {{"Hết hiệu lực"}}
                                    @endif
                                </td>
                                <td>{{$value->time_start}}</td>
                                <td>{{$value->time_end}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sale/delete/{{$value->id}}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sale/edit/{{$value->id}}">Edit</a></td>
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