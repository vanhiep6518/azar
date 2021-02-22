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
    <h1 id="login-head">Khôi phục mật khẩu</h1>
    <form action="{{route('admin.send-reset-pass')}}" method="post">
        @csrf
        <input type="text" name="email" id="email" placeholder="Email" value="">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        <input type="submit" name="btn-reset" id="btn-login" value="Gửi yêu cầu">
    </form>
    <a href="{{route('admin.login')}}" id="login">Đăng nhập</a>
{{--    <span>|<a href="?mod=users&amp;controller=index&amp;action=reg" id="logout"> Đăng ký</a></span>--}}
</div>
</body>
</html>
