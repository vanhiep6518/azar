<div id="menu">
    <div class="header__logo">
        <a href="http://81art.vn/" class="d-flex justify-content-between" title="Thiết kế &amp; Xây dựng Nhà đẹp 81ART">
            <div class="logo1__wrap"><img src="{{asset('images/Logo.png')}}" alt="Thiết kế &amp; Xây dựng Nhà đẹp 81ART" class="img-fluid --st1"></div>
            {{--                        <div class="logo2__wrap"><img src="https://81ART.vn/wp-content/uploads/2020/04/lgotexxt.png" alt="Thiết kế &amp; Xây dựng Nhà đẹp 81ART" class="img-fluid --st2"></div>--}}
        </a>
    </div>
    <div><a id="menu-hdtk" href="/hop-dong-thiet-ke" class="btn btn-light" title="" data-toggle="tooltip" data-original-title="Hợp đồng thiết kế">Hợp đồng thiết kế</a></div>
    <div><a id="menu-hdtckh" href="/hop-dong-thi-cong-khach-hang" class="btn " title="" data-toggle="tooltip" data-original-title="Hợp đồng thi công khách hàng">Hợp đồng thi công KH</a></div>
    @if(request()->segment(1) == 'hop-dong-thi-cong-khach-hang' || request()->segment(1) == 'hop-dong-thi-cong-noi-that')
        <div id="hdtc-them">
            <div><a id="menu-hdtc-trongoi" href="/hop-dong-thi-cong-khach-hang" class="btn btn-sub btn-sub-nho" title="" data-toggle="tooltip" data-original-title="Hợp đồng thi công trọn gói" aria-describedby="tooltip754010">HĐTC trọn gói</a></div>
            <div><a id="menu-hdtc-noithat" href="/hop-dong-thi-cong-noi-that" class="btn btn-sub-nho" title="" data-toggle="tooltip" data-original-title="Hợp đồng thi công nội thất">HĐTC nội thất</a></div>
        </div>
    @endif
    <div><a id="menu-hdtcdt" href="/hop-dong-thi-cong-doi-tac" class="btn " title="" data-toggle="tooltip" data-original-title="Hợp đồng thi công đối tác">Hợp đồng thi công ĐT</a></div>
</div>
