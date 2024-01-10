@extends('admin.master')
@section('title', "Têm danh mục")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Danh mục sản phẩm</h1>
    <a href="{{route('cp-admin.products.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Danh mục</a>
</div>

<div class="card shadow mb-4 ">
    <div class="card-body">
        <div class="table-responsive">
            <form class="user" action="{{ route('cp-admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="fullname">Tên khách hàng<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="fullname" value="{{ old('fullname') }}" name="fullname" placeholder="Tên sản phẩm ...">
                        @error('fullname')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="slugCategories">E-mail<span class="text-danger">(*)</span></label>
                        <input type="email " class="form-control form-control-user " id="email" value="{{ old('email') }}" name="email" id="emailCategories" placeholder="email sản phẩm ...">
                        @error('email')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="quantity">Số điện thoại<span class="text-danger">(*)</span></label>
                        <input type="phone" class="form-control form-control-user" id="phone" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Số lượng sản phẩm ...">
                        @error('phone')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="slugCategories">Địa chỉ<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user " id="address" value="{{ old('address') }}" name="address" id="addressCategories" placeholder="address sản phẩm ...">
                        @error('address')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <label for="discounts">Giảm giá (%) <span class="text-danger">(*)</span></label>
                        <input type="number" class="form-control form-control-user " id="discounts" name="discounts" value="0" id="discounts" placeholder="Giảm giá sản phẩm ...">
                        @error('discounts')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row ">
                    <div class=" col-sm-6 ">
                    <label for="slugCategories">Thuộc danh mục<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="category_id" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            @foreach($GroupUsers as $GroupUser)
                            <option value="{{$GroupUser->id}}">{{$GroupUser->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')<span class="text-danger">{{$message}}</span>@enderror   
                    </div>
                    <div class=" col-sm-6 ">
                    <label for="slugCategories">Nhà cung cấp<span class="text-danger">(*)</span></label>
                    <select class="custom-select" name="category_id" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            @foreach($GroupUsers as $GroupUser)
                            <option value="{{$GroupUser->id}}">{{$GroupUser->name}}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')<span class="text-danger">{{$message}}</span>@enderror   
                    </div>
                </div>
                <div class="form-group row">
                <div class=" col-sm-6 ">
                    <label for="slugCategories">Nguồn gốc xuất xứ<span class="text-danger">(*)</span></label>
                    <select class="custom-select" name="category_id" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            @foreach($GroupUsers as $GroupUser)
                            <option value="{{$GroupUser->id}}">{{$GroupUser->name}}</option>
                            @endforeach
                        </select>
                        @error('origin_id')<span class="text-danger">{{$message}}</span>@enderror   
                    </div>
                    <div class="col-sm-6">
                    <label for="slugCategories">Trạng thái<span class="text-danger">(*)</span></label>
                        <select class="custom-select" name="status" id="inputGroupSelect01">
                            <option selected value="1">Đang hoạt động</option>
                            <option value="0">Ngưng hoạt động</option>
                        </select>
                        @error('status')<span class="text-danger">{{$message}}</span>@enderror   
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0"><label for="slugCategories">Anh sản phẩm<span class="text-danger">(*)</span></label>
                        <div class="custom-file">
                            <!-- <input type="file" class="custom-file-input" id="inputGroupFile01"> -->
                            <input  id="image" type="file" id="image" name="image" class="form-control" require>
                            @error('image')<span class="text-danger">{{$message}}</span>@enderror   
                        </div>
                       
                    </div>
                </div>
                <div class="form-group row ">
                    <div class=" col-sm-12 ">
                    <label for="slugCategories">Mô tả sản phẩm</label>
                    <textarea class="form-control"name="Description" id="exampleFormControlTextarea1" rows="3">{{ old('Description') }}</textarea>
                    </div>
              
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Lưu lại</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{asset('admin/js/slug.js')}}"></script>

@endsection