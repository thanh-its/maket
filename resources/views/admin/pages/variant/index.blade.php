@extends('admin.master')
@section('title', "Biến thể")

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                   <h1 class="h3 mb-0 text-gray-800">Biến thể</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="row col-12">
                    <div class="col-4">
                        <h6>Thêm biến thể</h6>
                        <form action="{{route('cp-admin.variant.create')}}" method="POST" class="navbar-form navbar-left" role="search">
                            @csrf
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="slugCategories">Tên biến thể</label>
                                <input type="text" name="name" id="input-name" class="form-control" placeholder="Tên biến thể">
                            </div>
                            <div class="form-group">
                                <label for="slugCategories">Giá trị</label>
                                <input type="text" id="input-value" name="value" class="form-control" placeholder="Giá trị">
                            </div>
                            <div class="form-group">
                                <label for="slugCategories">Kiểu hiển thị</label>
                                <select class="custom-select" id="display-type" style="witdh: 200px" aria-label="Default select example" name="type">
                                    <option selected value="1">Tên</option>
                                    <option value="2">Màu</option>
                                </select>
                                <input class="mt-3" id="input-color" style="display:none" type="color">
                            </div>
                            <div class="form-group">
                                <label for="slugCategories">Thuộc biến thể</label>
                                <select class="custom-select" name="parent_id">
                                    <option value="0" selected>Biến thể cha</option>
                                    @foreach($parentVariants as $item)
                                       <option value="{{ $item->id }}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Thêm biến thể</button>
                        </form> 
                    </div>
                    <div class="table-responsive col-8">
                        <h6>Danh sách biến thể</h6>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Giá trị</th>
                                    <th>Thuộc loại</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index=1; ?>
                                @foreach($variants as $item)
                                <tr>
                                    <td class="text-center">{{$index++}}</td>
                                    <td class="text-center">{{$item->name}}</td>
                                    <td class="text-center">{{$item->value}}</td>
                                    <td class="text-center">{{$item->type == 0 ? 'Tên' : 'Màu'}}</td>
                                    <td class="text-center"><a class="btn btn-warning" href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td class="text-center"><a class="btn btn-danger" href="{{route('cp-admin.variant.delete' ,[ 'id' => $item->id ])}}"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
@section('javascript')
<script src="{{asset('admin/js/variant.js')}}"></script>
@endsection
