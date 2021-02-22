
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{asset('css/admin/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/login.css')}}">
</head>
<body>
<div id="wp-form-login">
    <h1 id="login-head">Đăng nhập</h1>
    <form action="{{route('admin.login')}}" method="post">
        @csrf
        <input type="text" name="email" id="username" placeholder="Email" value="{{ old('email') }}">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
        @error('login-err')
        <p class="error">{{ $message }}</p>
        @enderror
        <input type="checkbox" name="remember-me" id="remember-me"><label for="remember-me">Ghi nhớ đăng nhập</label>
        <input type="submit" name="btn-login" id="btn-login" value="Đăng nhập">
    </form>
    <a href="{{route('admin.send-reset-pass')}}" id="lost-pass">Quên mật khẩu ?</a>
</div>
</body>
</html>
