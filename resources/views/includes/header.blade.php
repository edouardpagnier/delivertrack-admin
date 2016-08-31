<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<!-- Wrapper -->
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
            <div class="top-left-part"><a class="logo" href="{{ url('/') }}"><b><img src="{{ asset('images/logo-small.png') }}" alt="home" /></b><span class="hidden-xs"><img src="{{ asset('images/logo-text-small.png') }}" alt="home" /></span></a></div>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ asset('plugins/images/users/default-avatar.png') }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b> </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li><a href="{{ url('/my-profile') }}"><i class="ti-user"></i> My Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
                <li> <a href="{{ url('/') }}" class="waves-effect"><i class="fa fa-dashboard fa-lg fa-fw"></i> <span class="hide-menu">Dashboard </span></a>
                </li>
                <li> <a href="{{ url('/map') }}" class="waves-effect"><i class="fa fa-map-marker fa-lg fa-fw"></i> <span class="hide-menu">Map </span></a>
                </li>
                <!--
                <li> <a href="#" class="waves-effect"><i class="fa fa-shopping-bag fa-lg fa-fw"></i> <span class="hide-menu">Orders <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="#">Order list</a> </li>
                        <li> <a href="#">New order</a> </li>
                        <li> <a href="#">History</a> </li>
                    </ul>
                </li>
                -->
                <li> <a href="{{ url('/drivers') }}" class="waves-effect"><i class="fa fa-truck fa-lg fa-fw"></i> <span class="hide-menu">Drivers <span class="label label-rouded driver_status2 pull-right" id="driver_inactive_number"></span><span class="label label-rouded driver_status3 pull-right" id="driver_active_number"></span></span></a>
                </li>
                <li class="nav-small-cap">--- Settings</li>
                <li><a href="{{ url('/my-profile') }}"><i class="ti-user"></i> My Profile</a></li>
                @if (Auth::user()->isAdmin())
                <li><a href="{{ url('/accounts') }}"><i class="ti-settings"></i> Accounts</a></li>
                @endif
                <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
        </div>
    </div>
