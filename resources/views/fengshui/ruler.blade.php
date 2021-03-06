@extends('layouts.app')
@section('css')
    <style>
        .wrap__page {
            margin-top: 100px!important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/loban.css')}}">
@endsection
@section('content')
    <div class="wrap__page page__full">
        <div class="container-fluid">
            <main class="site-main" role="main">
                <article class="page__content">
                    <header class="entry-header page__header">
                        <h1 class="page-title">Thước lỗ ban</h1>
                    </header>
                    <div class="entry-content --custom">
                        &#65279;
                        <div id="shi_main">
                            <div class="content">
                                <div id="lobanOuter" style="height:480px;">
                                    <div id="abc"></div>
                                    <div id="sodoLoban"></div>
                                    <div style="width:1px;height:375px;background:#ffa500;position:absolute;z-index:2;top:42px;left:50%;"></div>
                                    <p class="text-warning">Kéo thước để xem</p>
                                    <p style="position:absolute;z-index:2;top:15px;left:0;"><strong>Thước Lỗ Ban 52.2cm:</strong> Khoảng không thông thủy (cửa, cửa sổ...)</p>
                                    <p style="position:absolute;z-index:2;top:170px;left:0;"><strong>Thước Lỗ Ban 42.9cm (Dương trạch):</strong> Khối xây dựng (bếp, bệ, bậc...)</p>
                                    <p style="position:absolute;z-index:2;top:320px;left:0;"><strong>Thước Lỗ Ban 38.8cm (Âm phần):</strong> Đồ nội thất (bàn thờ, tủ...)</p>
                                    <div id="wrapper">
                                        <div id="scroller">
                                            <div id="pullRight" style="display:none;">
                                                <span class="pullRightIcon"></span><span class="pullRightLabel">Kéo qua phải tải thêm...</span>
                                            </div>
                                            <ul id="thelist">
                                                <li>
                                                    <img src="thuoc522.php"/>
                                                    <img src="thuoc429.php"/>
                                                    <img src="thuoc388.php"/>
                                                </li>
                                            </ul>
                                            <div id="pullLeft" style="display:none;">
                                                <span class="pullLeftIcon"></span><span class="pullLeftLabel">Kéo qua trái tải thêm...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>
@endsection
@section('custom-js')
    <script type='text/javascript' src='{{asset('js/jquery-1.7.2.js')}}'></script>
    <script type="text/javascript" src="{{asset('js/iscroll.js')}}"></script>
    <script type="text/javascript">
        //Mỗi đoạn thước dài 1000mm
        var rulerLength = 1000; //Số đo 1 đoạn thước (mm)
        var trimStart = 0;  //Số đo đầu của thước (mm)
        var trimEnd = 1000; //Số đo cuối của thước (mm)

        var myScroll;

        function pullRightAction() {
            if (trimStart > 0) {
                $('#scroller').width(function(i, width) {
                    return width + 10000;
                });
                trimStart -= rulerLength;
                var qStr = '?trimStart=' + trimStart + '&rulerLength=' + rulerLength;
                var newLi = $('<li>').append($('<img/>', {src: 'thuoc522.php' + qStr}))
                    .append($('<img/>', {src: 'thuoc429.php' + qStr}))
                    .append($('<img/>', {src: 'thuoc388.php' + qStr}));
                $('#thelist').prepend(newLi);
                myScroll.refresh();
            }
        }

        function pullLeftAction() {
            if (trimEnd < 100000) {
                $('#scroller').width(function(i, width) {
                    return width + 10000;
                });
                var qStr = '?trimStart=' + trimEnd + '&rulerLength=' + rulerLength;
                var newLi = $('<li>').append($('<img/>', {src: 'thuoc522.php' + qStr}))
                    .append($('<img/>', {src: 'thuoc429.php' + qStr}))
                    .append($('<img/>', {src: 'thuoc388.php' + qStr}));
                trimEnd += rulerLength;
                $('#thelist').append(newLi);
                myScroll.refresh();
            }
        }

        function loaded() {
            Math.nativeRound = Math.round;
            Math.round = function(i, iDecimals) {
                if (!iDecimals)
                    return Math.nativeRound(i);
                else
                    return Math.nativeRound(i * Math.pow(10, Math.abs(iDecimals))) / Math.pow(10, Math.abs(iDecimals));

            };

            myScroll = new iScroll('wrapper', {
                useTransition: true,
                leftOffset: $('#pullRight').outerWidth(true),
                onRefresh: function() {
                    if ($('#pullRight').hasClass('loading')) {
                        $('#pullRight').removeClass('loading');
                        $('#pullRight .pullRightLabel').html('Kéo qua phải tải thêm...');
                    } else if ($('#pullLeft').hasClass('loading')) {
                        $('#pullLeft').removeClass('loading');
                        $('#pullLeft .pullLeftLabel').html('Kéo qua trái tải thêm...');
                    }
                    $('#sodoLoban').html(Math.round((-this.x + 48 * 10) / 100, 2) + ' cm').css({'left': $('.container').outerWidth(true) / 2 - $('#sodoLoban').outerWidth(true) / 2});
                },
                onScrollMove: function() {
                    $('#sodoLoban').html(Math.round((-this.x + 48 * 10) / 100, 2) + ' cm').css({'left': $('.container').outerWidth(true) / 2 - $('#sodoLoban').outerWidth(true) / 2});
                },
                onScrollEnd: function() {
                    myScroll.refresh();
                    console.log(this.x);
                    console.log(($('#scroller').width() - 1000));
                    if (this.x > 5 && !$('#pullRight').hasClass('flip')) {
                        $('#pullRight').addClass('flip');
                        $('#pullRight .pullRightLabel').html('Thả ra để làm mới...');
                    } else if (this.x < -($('#scroller').width() - 2000) && !$('#pullRight').hasClass('flip')) {
                        $('#pullLeft').addClass('flip');
                        $('#pullLeft .pullLeftLabel').html('Thả ra để làm mới...');
                    }
                    //$('#abc').html('this.x='+this.x+' : out='+($('#scroller').width()-1000));
                    if ($('#pullRight').hasClass('flip')) {
                        $('#pullRight').removeClass('flip');
                        $('#pullRight').addClass('loading');
                        $('#pullRight .pullRightLabel').html('Đang tải...');
                        pullRightAction();	// Execute custom function (ajax call?)
                    } else if ($('#pullLeft').hasClass('flip')) {
                        $('#pullLeft').removeClass('flip');
                        $('#pullLeft').addClass('loading');
                        $('#pullLeft .pullLeftLabel').html('Đang tải...');
                        pullLeftAction();	// Execute custom function (ajax call?)
                    }
                    $('#sodoLoban').html(Math.round((-this.x + 48 * 10) / 100, 2) + ' cm').css({'left': $('.container').outerWidth(true) / 2 - $('#sodoLoban').outerWidth(true) / 2});
                }
            });

            setTimeout(function() {
                document.getElementById('wrapper').style.left = '0';
            }, 800);
        }
        if (document.addEventListener) {
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(loaded, 200);
            }, false);
        } else {
            document.attachEvent('onreadystatechange', function() {
                setTimeout(loaded, 200);
            });
        }

    </script>
@endsection


