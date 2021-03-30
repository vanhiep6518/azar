<nav class="topnav shadow navbar-light bg-white d-flex">
    <div class="navbar-brand"><a href="?">81ART ADMIN</a></div>
    <div class="nav-right ">
        <div class="btn-group mr-auto">
{{--            <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                <i class="plus-icon fas fa-plus-circle"></i>--}}
{{--            </button>--}}
            <div class="dropdown-menu">
                <a class="dropdown-item" href="?view=add-post">Thêm bài viết</a>
                <a class="dropdown-item" href="?view=add-product">Thêm sản phẩm</a>
                <a class="dropdown-item" href="?view=list-order">Thêm đơn hàng</a>
            </div>
        </div>
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::guard('admin')->user()->name}}
            </button>
            <div class="dropdown-menu dropdown-menu-right">
{{--                <a class="dropdown-item" href="#">Tài khoản</a>--}}
                <a class="dropdown-item" href="{{route('admin.logout')}}">Thoát</a>
            </div>
        </div>
    </div>
</nav>
