<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>

    @include('includes.header')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; DeliverTrack </footer>
    </div>
    <!-- /#page-wrapper -->
    @include('includes.footer')

</body>
</html>