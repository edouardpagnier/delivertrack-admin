<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>

<!-- Page Content -->
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            @yield('content')
        </div>
    </div>
</section>

@include('includes.footer')

</body>
</html>