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


    </ul>
</div>
