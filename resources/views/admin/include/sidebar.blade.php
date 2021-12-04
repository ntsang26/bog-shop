<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route("admin.dashboard")}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Bảng điều khiển
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Quản lý người dùng
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{!!route('admin.user.getListUserRegister')!!}">
                            <i class="fas fa-user"></i>
                            &nbsp;Người dùng đăng ký
                        </a>
                        <a class="nav-link" href="{!!route('admin.user.getListUserManager')!!}">
                            <i class="fas fa-user-secret"></i>
                            &nbsp;Quản trị viên
                        </a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
                    <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                    Quản lý sản phẩm
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProduct" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{!! route('admin.product.cate.getList') !!}">
                            <i class="fas fa-shopping-cart"></i>
                            &nbsp;Danh mục sản phẩm
                        </a>
                        <a class="nav-link" href="{!! route('admin.product.list') !!}">
                            <i class="fas fa-shopping-cart"></i>
                            &nbsp;Sản phẩm
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div>
                <small>
                    Logged in as: 
                </small>
                {!! \Illuminate\Support\Facades\Auth::user()->full_name !!}
            </div>
        </div>
    </nav>
</div>