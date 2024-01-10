<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="admin/header.css">

    <!-- DataTables CSS -->
    <link href="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header navbar-nav-right">
                {{-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> --}}
                @include('admin/divide/header')
            </div>
          
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Người dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/user/list">Danh sách người dùng</a>
                                </li>
                                <li>
                                    <a href="admin/user/add">Thêm mới người dùng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/category/list">Danh sách danh mục</a>
                                </li>
                                <li>
                                    <a href="admin/category/add">Thêm mới danh mục</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/product/list">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="admin/product/add">Thêm mới sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Nhà cung cấp<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/supplier/list">Danh sách nhà cung cấp</a>
                                </li>
                                <li>
                                    <a href="admin/supplier/add">Thêm mới nhà cung cấp</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Đơn hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/order/list">Danh sách đơn hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Bài viết<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/post/list">Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="admin/post/add">Thêm mới bài viết</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Sale<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/sale/list">Chương trình khuyến mãi</a>
                                </li>
                                <li>
                                    <a href="admin/sale/add">Thêm mới mã khuyến mãi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="admin/dist/js/sb-admin-2.js"></script>
    <script src="admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
