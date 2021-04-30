<div id="sidebar" class="bg-white">
    <ul id="sidebar-menu">
{{--        <li class="nav-link {{ (request()->segment(2) == '') ? 'active' : '' }}">--}}
{{--            <a href="{{route('admin.dashboard')}}">--}}
{{--                <div class="nav-link-icon d-inline-flex">--}}
{{--                    <i class="far fa-folder"></i>--}}
{{--                </div>--}}
{{--                Dashboard--}}
{{--            </a>--}}
{{--            <i class="arrow fas fa-angle-right"></i>--}}
{{--        </li>--}}
        <li class="nav-link {{ (request()->segment(2) == 'project') ? 'active' : '' }}">
            <a href="{{route('admin.project')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Dự án
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="{{route('admin.saveProject')}}">Thêm mới</a></li>
                <li><a href="{{route('admin.project')}}">Danh sách</a></li>
                <li><a href="{{route('admin.projectCat')}}">Danh mục</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'furniture') ? 'active' : '' }}">
            <a href="{{route('admin.furniture')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Nội thất
            </a>
            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="{{route('admin.saveFurniture')}}">Thêm mới</a></li>
                <li><a href="{{route('admin.furniture')}}">Danh sách</a></li>
                <li><a href="{{route('admin.furnitureCat')}}">Danh mục</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'construction') ? 'active' : '' }}">
            <a href="{{route('admin.construction')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Thi công
            </a>
            <i class="arrow fas fa-angle-down"></i>
            <ul class="sub-menu">
                <li><a href="{{route('admin.saveConstruction')}}">Thêm mới</a></li>
                <li><a href="{{route('admin.construction')}}">Danh sách</a></li>
                <li><a href="{{route('admin.constructionCat')}}">Danh mục</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'con-progress') ? 'active' : '' }}">
            <a href="{{route('admin.progress')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Tiến độ thi công
            </a>            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="{{route('admin.saveProgress')}}">Thêm mới</a></li>
                <li><a href="{{route('admin.progress')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'price') ? 'active' : '' }}">
            <a href="{{route('admin.price')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Bảng giá
            </a>
            <i class="arrow fas fa-angle-down"></i>
            <ul class="sub-menu">
                <li><a href="{{route('admin.savePrice')}}">Thêm mới</a></li>
                <li><a href="{{route('admin.price')}}">Danh sách</a></li>
                <li><a href="{{route('admin.priceCat')}}">Danh mục</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'design-price') ? 'active' : '' }}">
            <a href="{{route('admin.listDesignPrice')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Bảng giá thiết kế
            </a>
            <i class="arrow fas fa-angle-down"></i>
            <ul class="sub-menu">
                <li><a href="{{route('admin.saveDesignPrice')}}">Thêm mới</a></li>
                <li><a href="{{route('admin.listDesignPrice')}}">Danh sách</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'page') ? 'active' : '' }}">
            <a href="{{route('admin.page')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Trang
            </a>            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="{{route('admin.savePage')}}">Thêm mới</a></li>
                <li><a href="{{route('admin.page')}}">Danh sách</a></li>
            </ul>
        </li>
{{--        <li class="nav-link {{ (request()->segment(2) == 'slider') ? 'active' : '' }}">--}}
{{--            <a href="{{route('admin.slider')}}">--}}
{{--                <div class="nav-link-icon d-inline-flex">--}}
{{--                    <i class="far fa-folder"></i>--}}
{{--                </div>--}}
{{--                Slider--}}
{{--            </a>            <i class="arrow fas fa-angle-right"></i>--}}

{{--            <ul class="sub-menu">--}}
{{--                <li><a href="{{route('admin.saveSlider')}}">Thêm mới</a></li>--}}
{{--                <li><a href="{{route('admin.slider')}}">Danh sách</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}

        <li class="nav-link {{ (request()->segment(2) == 'baogia') ? 'active' : '' }}">
            <a href="/admin/bao-gia-thiet-ke" target="_blank">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Báo giá & Hợp đồng
            </a>            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="/admin/bao-gia-thiet-ke" target="_blank">Báo giá thiết kế</a></li>
                <li><a href="/admin/bao-gia-thi-cong" target="_blank">Báo giá thi công</a></li>
                <li><a href="/admin/hop-dong-thiet-ke" target="_blank">Hợp đồng thiết kế</a></li>
                <li><a href="/admin/hop-dong-thi-cong-khach-hang" target="_blank">Hợp đồng thi công KH</a></li>
                <li><a href="/admin/hop-dong-thi-cong-noi-that" target="_blank">HĐTC nội thất</a></li>
                <li><a href="/admin/hop-dong-thi-cong-doi-tac" target="_blank">Hợp đồng thi công ĐT</a></li>
                <li><a href="/admin/khai-toan" target="_blank">Khai toán</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'product') ? 'active' : '' }}">
            <a href="{{route('admin.product')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Sản phẩm
            </a>
            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="{{route('admin.saveProduct')}}">Thêm mới</a></li>
                <li><a href="{{route('admin.product')}}">Danh sách</a></li>
                <li><a href="{{route('admin.productCat')}}">Danh mục</a></li>
            </ul>
        </li>

        <li class="nav-link {{ (request()->segment(2) == 'order') ? 'active' : '' }}">
            <a href="{{route('admin.order')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Bán hàng
            </a>
            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="{{route('admin.order')}}">Danh sách đơn hàng</a></li>
            </ul>
        </li>

        <li class="nav-link {{ (request()->segment(2) == 'video') ? 'active' : '' }}">
            <a href="{{route('admin.video')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
               Video
            </a>
{{--            <i class="arrow fas fa-angle-right"></i>--}}
        </li>


    </ul>
</div>
