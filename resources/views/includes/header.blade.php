<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<!-- Wrapper -->
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
            <div class="top-left-part"><a class="logo" href="index.html"><b><img src="../plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="../plugins/images/eliteadmin-text.png" alt="home" /></span></a></div>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../plugins/images/users/default-avatar.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b> </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
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
                <li class="user-pro"> <a href="#" class="waves-effect"><img src="../plugins/images/users/default-avatar.png" alt="user-img"  class="img-circle"> <span class="hide-menu"> {{ Auth::user()->name }}<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <li> <a href="#" class="waves-effect active"><i class="fa fa-dashboard fa-lg fa-fw"></i> <span class="hide-menu">Dashboard </span></a>
                </li>
                <li> <a href="#" class="waves-effect"><i class="fa fa-map-marker fa-lg fa-fw"></i> <span class="hide-menu">Map </span></a>
                </li>
                <li> <a href="#" class="waves-effect"><i class="fa fa-shopping-bag fa-lg fa-fw"></i> <span class="hide-menu">Orders <span class="fa arrow"></span> <span class="label label-rouded label-custom pull-right">4</span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="#">Order list</a> </li>
                        <li> <a href="#">New order</a> </li>
                        <li> <a href="#">History</a> </li>
                    </ul>
                </li>
                <li> <a href="#" class="waves-effect"><i class="fa fa-truck fa-lg fa-fw"></i> <span class="hide-menu">Drivers <span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="#">Driver list</a> </li>
                        <li> <a href="#">New driver</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
