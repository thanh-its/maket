@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                {{-- <form action="admin/item/search" method="POST" class="navbar-form navbar-left" role="search">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <input type="text" name="key" class="form-control" placeholder="Tìm kiếm">
                    </div>
                </form> --}}
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Supplier's name</th>
                            <th>Category's name</th>
                            <th>Product's name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $value)
                            <tr class="odd gradeX" align="center">
                                <td>{{$value->id}}</td>
                                <td>
                                    @foreach($supplier as $b)
                                        @if($b->id == $value->supplier_id)
                                            {{$b->nameSupplier}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$value->nameCate}}
                                    @foreach($category as $b)
                                    @if($b->id == $value->category_id)
                                        {{$b->nameCate}}
                                     @endif
                                    @endforeach
                                </td>
                                <td>{{$value->namePro}}</td>
                                <td>{{$value->image}}</td>
                                <td>{{$value->quantity}}</td>
                                <td>{{$value->price}}</td>
                                <td>{{ $value->status==1 ? "Còn hàng" : "Hết hàng" }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$value->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$value->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
            {{$product->links()}}
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection

