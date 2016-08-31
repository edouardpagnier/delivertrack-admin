<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class="fix-sidebar">

    @include('includes.header')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <!-- .page title -->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">@yield('title')</h4>
                </div>
                <!-- /.page title -->
                <!-- .breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        @yield('breadcrumb')
                    </ol>
                </div>
                <!-- /.breadcrumb -->
            </div>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div> <!-- end .flash-message -->
            @yield('content')

        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; DeliverTrack </footer>
    </div>
    <!-- /#page-wrapper -->
    @include('includes.footer')

    @yield('scripts')

</body>
</html>