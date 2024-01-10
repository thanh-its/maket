@extends('admin.master')
@section('title', "Tạo vai trò")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tạo vai trò</h1>
    <a href="{{route('cp-admin.user.role.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Vai trò</a>
</div>

<div class="card shadow mb-4 ">
    <div class="card-body">
        <div class="table-responsive">
            <form class="user" action="{{ route('cp-admin.user.role.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nameCategories">Chức vụ <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user" id="name" value="{{ old('name') }}" name="name" id="namegories" placeholder="Tên danh mục ...">
                        @error('name')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="slugCategories">Mô tả chức vụ<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control form-control-user " id="desc " value="{{ old('desc') }}" name="desc" id="desc Categories" placeholder="Mô tả ...">
                        @error('desc')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>


                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input checkbox_all" type="checkbox">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Tất cả các loại
                                            </label>
                                        </div>
                                    </th>
                                    <th>Xem</th>
                                    <th>Thêm </th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-dark">
                                <tr>
                                <th>
                                        <div class="form-check">
                                            <input class="form-check-input checkbox_all" type="checkbox">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Tất cả các loại
                                            </label>
                                        </div>
                                    </th>
                                    <th>Xem</th>
                                    <th>Thêm </th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr class="checkboxRow">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input checkbox_wrapper" type="checkbox" id="defaultCheck1 customCheckbox{{$permission->id}}" value="{{$permission->id}}">
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{$permission->name }}
                                            </label>
                                        </div>
                                        @foreach($permission->permissionsChilden as $permission_Childen)
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input checkbox_childen" type="checkbox" name="permission_id[]" id="defaultCheck1 customCheckbox{{$permission->id}}" value="{{$permission_Childen->id}}">
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{$permission_Childen->name }}
                                            </label>
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Lưu lại</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')
@if(session('message'))
<script>
    swal("Hành động", " {!! session('message') !!}", "success", {
        button: "OK",
    })
</script>
@endif
<script>
    $('.checkbox_wrapper').on('click', function() {
        $(this).parents('.checkboxRow').find('.checkbox_childen').prop('checked', $(this).prop('checked'));
    })

    $('.checkbox_all').on('click', function() {
        $(this).parents('').find('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        // $(this).parents('.card').find('.checkbox_childen').prop('checked', $(this).prop('checked'));
    })
</script>

@endsection