<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/adminox/layouts/vertical/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Feb 2021 20:40:13 GMT -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    @include('Auth.cssjs.scriptcss')

</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

    <div class="home-btn d-none d-sm-block">
        <a href="{{url('/')}}"><i class="fas fa-home h2 text-white"></i></a>
    </div>

    @yield('content')

 @include('auth.cssjs.scriptcss')

</body>
</html>