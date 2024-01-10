@extends('admin.master')
@section('title', "Cập nhật liên hệ")
@section('style')
<style>

</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật liên hệ</h1>
    <a href="{{route('cp-admin.contact.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Liên hệ</a>
</div>

<div class="card shadow mb-4 ">
    <div class="card-body">
        <div class="table-responsive">
            <form class="user" action="{{route('cp-admin.contact.update',[ 'id' => $contact->id ])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="slugCategories">Trạng thái</label>
                        <select class="custom-select" name="status" id="inputGroupSelect01">
                            @foreach( App\Common\Constants::STATUS_CONTATCT as $key => $status)
                            <option value="{{$key}}" {{ $contact->status == $key ? "selected": "" }}>{{$status}}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
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
<script>
    function previewFile(input) {
        var file = $("#product_image").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewimg').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection