<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
    <title>Admintrator</title>
    <link rel="icon" href="{{asset('images/LOGO.jpg')}}">
</head>

<body>
<div id="warpper" class="nav-fixed">
    @include('admin.layouts.nav-top')
    <!-- end nav  -->
    <div id="page-body" class="d-flex">
        @include('admin.layouts.sidebar')
        <div id="wp-content">
            @yield('content')
        </div>
    </div>


</div>
@include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{asset('js/admin/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/hvsds69cascgsqjj3n5uo0a69n7445kf4ctr8rd43li9jtns/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@yield('custom-js')
</body>

</html>
