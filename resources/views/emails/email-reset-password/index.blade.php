<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table width="680" border="0" cellspacing="0" cellpadding="0" style="background:#f5f5f5;border-top:5px #2292d0 solid;margin:0 auto;border-left:1px solid #ddd;border-right:1px solid #ddd;border-bottom:1px solid #ddd">
    <tbody><tr>
        <td><h1 style="font-size:28px;font-weight:normal;text-align:center;padding:25px 0px;margin:0">Lấy lại mật khẩu trên Azar.vn</h1></td>
    </tr>
    <tr>
        <td>
            <div style="float:left;width:655px;margin:0 20px;display:inline;background:#fff;border:1px #dddddd solid;border-radius:5px;padding-bottom:50px">
                <div style="float:left;width:580px;border-bottom:1px #dddddd solid;margin:0 0 0 46px;display:inline;padding:25px 0px;line-height:18px">
                    <span><i>Chào <b>{{$user->name}}}</b>,</i></span>
                    <p style="padding:10px 0px 15px 0px;margin:0;line-height:24px">
                        Azar.vn vừa nhận được một yêu cầu lấy lại mật khẩu trên tài khoản của bạn. Để thiết lập lại mật khẩu bạn vui lòng click vào link bên dưới:<br>
                        <a href="{{route('admin.reset-pass')}}?email={{$user->email}}&token={{$token}}" style="color:#15c" target="_blank" >{{route('admin.reset-pass')}}/?<wbr>email={{$user->email}}<wbr>&amp;token=<wbr>{{$token}}<wbr></a>
                        <br>Nếu không phải yêu cầu của bạn, hãy bỏ qua email này.
                    </p>
                </div>
                <div style="float:left;width:100%;text-align:center">
                    <p style="padding:20px 0;margin:0"></p>
                    <a href="{{route('admin.reset-pass')}}?email={{$user->email}}&token={{$token}}" style="color:#fff;font-size:14px;text-decoration:none;background:#2292d0;border-radius:5px;padding:18px 25px" target="_blank" >Reset Password</a>
                </div>
            </div>
        </td>
    </tr>
{{--    <tr>--}}
{{--        <td style="padding:20px 0;text-align:center">--}}
{{--            <font color="#737373" style="font-size:11px">@2017 Unitop.vn All Right Reserved. Terms of Service &amp; Privacy Policy</font>--}}
{{--        </td>--}}
{{--    </tr>--}}
    </tbody></table>
</body>
</html>
