<div id="sidebar" class="bg-white">
    <ul id="sidebar-menu">
        <li class="nav-link {{ (request()->segment(2) == '') ? 'active' : '' }}">
            <a href="{{route('admin.dashboard')}}">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Dashboard
            </a>
            <i class="arrow fas fa-angle-right"></i>
        </li>
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
            <a href="?view=list-post">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Nội thất
            </a>
            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="?view=add-post">Thêm mới</a></li>
                <li><a href="?view=list-post">Danh sách</a></li>
                <li><a href="?view=cat">Danh mục</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'construction') ? 'active' : '' }}">
            <a href="?view=list-product">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Thi công
            </a>
            <i class="arrow fas fa-angle-down"></i>
            <ul class="sub-menu">
                <li><a href="?view=add-product">Thêm mới</a></li>
                <li><a href="?view=list-product">Danh sách</a></li>
                <li><a href="?view=cat-product">Danh mục</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'price') ? 'active' : '' }}">
            <a href="?view=list-order">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Bảng giá
            </a>
            <i class="arrow fas fa-angle-right"></i>
            <ul class="sub-menu">
                <li><a href="?view=list-order">Đơn hàng</a></li>
            </ul>
        </li>
        <li class="nav-link {{ (request()->segment(2) == 'feng-shui') ? 'active' : '' }}">
            <a href="?view=list-user">
                <div class="nav-link-icon d-inline-flex">
                    <i class="far fa-folder"></i>
                </div>
                Phong thủy
            </a>            <i class="arrow fas fa-angle-right"></i>

            <ul class="sub-menu">
                <li><a href="?view=add-user">Thêm mới</a></li>
                <li><a href="?view=list-user">Danh sách</a></li>
            </ul>
        </li>


    </ul>
</div>
