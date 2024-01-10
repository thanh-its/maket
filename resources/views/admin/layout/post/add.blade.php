@extends('admin.layout.admin')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/post/add" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="txtTittle" placeholder="Please Enter Title" />
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image"/>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <input class="form-control" name="txtContent" placeholder="Please Enter Content" />
                        </div>
                        <div class="form-group">
                            <label>Source</label>
                            <input class="form-control" name="txtSource" placeholder="Please Enter Source" />
                        </div>

                        <div class="form-group">
                            <label>Date_update</label>
                            <input type="date" class="form-control" name="date_update"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="txtDescription" placeholder="Please Enter Description" />
                        </div>
                        <button type="submit" class="btn btn-default">Post Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection