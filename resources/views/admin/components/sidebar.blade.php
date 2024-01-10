<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('storage/' . $config->logo) }}" style="width:80px" alt="">
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('cp-admin.dashboad')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Điều khiển</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Hàng hóa
    </div>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-list"></i>
            <span>Sản phẩm</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('XEM-LOAI-SAN-PHAM')
                <h6 class="collapse-header">Danh mục:</h6>
                <a class="collapse-item" href="{{route('cp-admin.category.index')}}">Danh mục sản phẩm</a>
                @endcan
                @can('XEM-SAN-PHAM')
                <h6 class="collapse-header"> Sản phẩm :</h6>
                <a class="collapse-item" href="{{route('cp-admin.products.index')}}">Danh sách sản phẩm</a>
                @endcan
                @can('XEM-NHA-PHAN-PHOI')
                <h6 class="collapse-header"> Nhà phân phối :</h6>
                <a class="collapse-item" href="{{route('cp-admin.supplier.index')}}">Danh sách nhà phân phối</a>
                @endcan
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-list"></i>
            <span>Kinh doanh</span>
        </a>
        <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('XEM-DON-HANG')
                <h6 class="collapse-header"> Đơn hàng :</h6>
                <a class="collapse-item" href="{{route('cp-admin.orders.index')}}">Danh sách đơn hàng</a>
                @endcan
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-list"></i>
            <span>Bài viết</span>
        </a>
        <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('XEM-LOAI-BAI-VIET')
                <h6 class="collapse-header"> Loại bài viết :</h6>
                <a class="collapse-item" href="{{route('cp-admin.cate_blog.index')}}">Danh sách loại bài viết</a>
                @endcan
                @can('XEM-BAI-VIET')
                <h6 class="collapse-header"> Bài viết :</h6>
                <a class="collapse-item" href="{{route('cp-admin.blogs.index')}}">Danh sách bài viết</a>
                @endcan
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages41" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-list"></i>
            <span>Liên hệ</span>
        </a>
        <div id="collapsePages41" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @can('XEM-LIEN-HE')
                <h6 class="collapse-header"> Liên hệ :</h6>
                <a class="collapse-item" href="{{route('cp-admin.contact.index')}}">Danh sách liên hệ</a>
                @endcan
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Người dùng
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-user"></i>
            <span>Khách hàng</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
                @can('XEM-NHOM-KHACH-HANG')
                <a class="collapse-item" href="{{route('cp-admin.groups.index')}}">Nhóm khách hàng</a>
                @endcan
                @can('XEM-KHACH-HANG')
                <a class="collapse-item" href="{{route('cp-admin.customers.index')}}">Danh sách khách hàng</a>
                @endcan
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#nhan-vien" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-user"></i>
            <span>Nhân viên</span>
        </a>
        <div id="nhan-vien" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
                @can('XEM-CHUC-VU')
                <a class="collapse-item" href="{{route('cp-admin.user.role.index')}}">Chức vụ</a>
                @endcan
                @can('XEM-NHAN-VIEN')
                <a class="collapse-item" href="{{route('cp-admin.user.index')}}">Danh sách nhân viên</a>
                @endcan
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>