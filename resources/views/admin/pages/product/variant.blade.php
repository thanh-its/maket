@extends('admin.master')
@section('title', "Thêm biến thể sản phẩm")

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="col-lg-12">
        <div class="d-flex my-2 justify-content-between">
           <h1 class="h3 mb-0 text-gray-800">Danh sách biến thể</h1>
           <a href="" style="width: 150px;" class="btn btn-primary btn-user btn-block">Thêm biến thể</a>
        </div>
        <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Biến thể 1</th>
                    <th>Biến thể 2</th>
                    <th>Giá</th>
                    <th>Sale</th>
                    <th>Số lượng</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{asset('admin/js/variant.js')}}"></script>
@endsection