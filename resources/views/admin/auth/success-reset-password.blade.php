
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khôi phục mật khẩu</title>
    <link rel="stylesheet" href="{{asset('css/admin/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/login.css')}}">
</head>
<body>
<div id="wp-form-login">
    <div class="noti">
        <div class="noti-body text-center">
            <div class="icon">
                <img src="{{asset('images/checked.png')}}">
            </div>
            <p class="text-success">Đổi mật khẩu thành công</p>
            <a href="{{route('admin.login')}}" title="Email" class="btn btn-primary">Đăng nhập</a>
        </div>
    </div>
</div>
</body>
</html>
