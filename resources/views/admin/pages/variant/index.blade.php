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
                    <form action="{{ !isset($variant) ? route('cp-admin.variant.create') : route('cp-admin.variant.update')}}" method="POST" class="navbar-form navbar-left"
                        role="search">
                        @csrf
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{isset($variant) ? $variant->id : ''}}">
                        <div class="form-group">
                            <label for="slugCategories">Tên biến thể</label>
                            <input type="text" name="name" id="input-name" class="form-control" value="{{isset($variant) ? $variant->name : ''}}"
                                placeholder="Tên biến thể">
                        </div>
                        <div class="form-group">
                            <label for="slugCategories">Giá trị</label>
                            <input type="text" id="input-value" name="value" class="form-control" value="{{isset($variant) ? $variant->value : ''}}" placeholder="Giá trị">
                        </div>
                        <div class="form-group">
                            <label for="slugCategories">Kiểu hiển thị</label>
                            <select class="custom-select" id="display-type" style="witdh: 200px"
                                aria-label="Default select example" name="type">
                                <option @if(isset($variant) && $variant->type == 0) selected @endif value="0">Tên</option>
                                <option  @if(isset($variant) && $variant->type == 1) selected @endif value="1">Màu</option>
                            </select>
                            <input class="mt-3" id="input-color" value="{{isset($variant) ? $variant->value : ''}}" style="@if(!isset($variant) ||  isset($variant) && $variant->type == 0) display:none @endif" type="color">
                        </div>
                        <div class="form-group">
                            <label for="slugCategories">Thuộc biến thể</label>
                            <select class="custom-select" name="parent_id">
                                <option value="0" selected>Biến thể cha</option>
                                @foreach($parentVariants as $item)
                                <option @if(isset($variant) && $variant->parent_id == $item->id) selected @endif value="{{ $item->id }}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn {{isset($variant) ? 'btn-warning' : 'btn-primary'}} btn-user btn-block">{{isset($variant) ? 'Sửa biến thể' : 'Thêm biến thể'}}</button>
                    </form>
                </div>
                <div class="table-responsive col-8">
                    <div class="d-flex my-2 justify-content-end"> <a href="{{route('cp-admin.variant.index')}}" style="width: 150px;" class="btn btn-primary btn-user btn-block">Thêm biến thể</a></div>
                    @foreach($variants as $item)
                        <h6>Biến thể: {{$item->name}} </h6>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Giá trị</th>
                                    <th>Kiểu hiển thị </th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($item->children as $ind => $chird)
                                <tr id="var-{{$chird->id}}">
                                    <td class="text-center">{{$ind+1}}</td>
                                    <td class="text-center" style="width: 150px">{{$chird->name}}</td>
                                    <td class="text-center">@if($chird->type == 1) <div class="rounded-circle"
                                            style="background-color: {{$chird->value}}; width: 30px;height:30px;margin: 0 auto">
                                        </div> @else <p> {{$chird->value}}</p> @endif</td>
                                    <td class="text-center">{{$chird->type == 0 ? 'Tên' : 'Màu'}}</td>
                                    <td class="text-center"><a class="btn btn-warning" href="{{route('cp-admin.variant.edit' , $chird->id)}}"><i
                                                class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td class="text-center"><a class="btn btn-danger"
                                                onclick="deleteCate({{ $chird->id}})"><i
                                                class="fa-solid fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
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