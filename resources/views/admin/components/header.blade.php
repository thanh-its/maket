<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>
@can('XEM-MAKET')
<!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        @csrf
        <div class="input-group">
            <select class="form-control custom-select" id="maketStatus" onchange="changeMaketStatus()">
                <option value="1" {{ $config->market_status == 1 ? "selected" : "" }}>Mở chợ</option>
                <option value="0" {{ $config->market_status == 0 ? "selected" : "" }}>Đóng chợ</option>
            </select>
        </div>
    </form>
@endcan
<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->fullname}}</span>
            <img class="img-profile rounded-circle"
                src="{{ asset('storage/' . auth()->user()->avatar) }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('cp-admin.profile') }}"  >
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Thông tin cá nhân
            </a>
             <a class="dropdown-item" href="{{ route('cp-admin.config') }}">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Cấu hình website
            </a>
           <!-- <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>
<script>
    @can('SUA-MAKET')
    function changeMaketStatus() {
        const url = '/cp-admin/change-maket-status';
        let market_status = $("#maketStatus").val();
        let _token = $("input[name=_token]").val();
        let data = { market_status, _token };
        swal({
            title: "Bạn có chắc không?",
            text: " ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "post",
                        url: url,
                        data: data,
                        success: function(res) {
                            console.log(res.status)
                            if (res.status == 200) {
                                swal("Tệp của bạn đã được thay đổi!", {
                                    icon: "success",
                                });
                            } else if (res.status == 401) {
                                swal(res.message, {
                                    icon: "error",
                                });
                            }
                        }
                    });

                } else {
                    swal("Tệp của bạn an toàn!!");
                }
            });
    }
    @endcan
</script>
