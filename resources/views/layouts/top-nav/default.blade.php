<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Licenta</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href={{ URL::asset('AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css') }}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href={{ URL::asset('AdminLTE-2.3.11/dist/css/AdminLTE.min.css') }}>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href={{ URL::asset('AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css') }}>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue-light layout-boxed">
<div class="wrapper">

    {{--@include('layouts.top-nav.nav')--}}

    <style>
        html,body { height:100%; !important; }
    </style>

    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Licenta</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    @include('layouts.top-nav.notifications')

                    <!-- User Account: style can be found in dropdown.less -->
                    @if(Auth::check())
                        @include('layouts.top-nav.profile_nav')
                    @else
                        <li>
                            <a href="/login">Log in</a>
                        </li>
                    @endif

                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->


    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            @if(Auth::check())
                <div class="user-panel" style="padding-bottom: 30px;">
                    <div class="pull-left image">
                        <img src="{{Auth::user()->picture_url}}" onerror="this.src='/storage/avatars/default'" class="img-circle" alt="User Image" style="height:45px;">
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::user()->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
            @endif

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                @foreach(\App\Menu::all() as $menu)
                    <li><a href="/pages/{{$menu->getPage()->slug}}"><i class="fa {{$menu->getPage()->menu_icon}}"></i> {{$menu->getPage()->menu_title}}</a></li>
                @endforeach

{{--                <li>
                    <a href="../widgets.html">
                        <i class="fa fa-th"></i> <span>Widgets</span>
                        <span class="pull-right-container">
          <small class="label pull-right bg-green">new</small>
        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Charts</span>
                        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                        <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                        <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                        <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                    </ul>
                </li>--}}

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Full Width Column -->
    <div class="content-wrapper" {{--style="display:inline-block"--}}>
            <!-- Content Header (Page header) -->
        @include('layouts.admin.title-breadcrumb', ['title' => isset($title) ? $title : null, 'subtitle' => isset($subtitle) ? $subtitle : null, 'breadcrumbs' => \App\Breadcrumbs::get(Request::path())])
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-xs-12">
                        @if(Session::has('success_message'))
                            <div class="alert alert-success">
                                {{ Session::get('success_message') }}
                            </div>

                        @elseif(Session::has('warning_message'))
                            <div class="alert alert-warning">
                                {{ Session::get('warning_message') }}
                            </div>

                        @elseif(Session::has('error_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('error_message') }}
                            </div>

                        @endif
                    </div>
                </div>

                @yield('content')
            </section>
            <!-- /.content -->
        </div>

    <!-- /.content-wrapper -->

    @include('layouts.top-nav.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src={{ URL::asset('AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js') }}></script>
<!-- Bootstrap 3.3.6 -->
<script src={{ URL::asset('AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js') }}></script>
<!-- Bootstrap 3.3.6 Affix-->
<script src={{ URL::asset('AdminLTE-2.3.11/bootstrap/js/bootstrap_plugins/affix.js') }}></script>
<!-- SlimScroll -->
<script src={{ URL::asset('AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js') }}></script>
<!-- FastClick -->
<script src={{ URL::asset('AdminLTE-2.3.11/plugins/fastclick/fastclick.js') }}></script>
<!-- AdminLTE App -->
<script src={{ URL::asset('AdminLTE-2.3.11/dist/js/app.min.js') }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ URL::asset('AdminLTE-2.3.11/dist/js/demo.js') }}></script>
</body>
</html>