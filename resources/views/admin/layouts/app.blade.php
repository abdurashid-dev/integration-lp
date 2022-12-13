<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
        @stack('title')
    </title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('includes/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('includes/dist/css/adminlte.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('includes/plugins/toastr/toastr.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('includes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    @livewireStyles
    @yield('styles')
</head>

<body class="hold-transition @if(Cookie::get('darkMode')) dark-mode @endif
    sidebar-mini sidebar-collapse layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> --}}

    <!-- Navbar -->
    @include('admin.layouts.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid p-3">
                @yield('content')
                @if(isset($slot))
                    {{$slot}}
                @endif
            </div>
        </section>
        <!-- Content Header (Page header) -->
        {{--        <div class="content-header">--}}
        {{--            <div class="container-fluid">--}}
        {{--                <div class="mb-2 row">--}}
        {{--                    <div class="col-sm-6">--}}
        {{--                        <h1 class="m-0">Dashboard</h1>--}}
        {{--                    </div><!-- /.col -->--}}
        {{--                    <div class="col-sm-6">--}}
        {{--                        <ol class="breadcrumb float-sm-right">--}}
        {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
        {{--                            <li class="breadcrumb-item active">Dashboard v1</li>--}}
        {{--                        </ol>--}}
        {{--                    </div><!-- /.col -->--}}
        {{--                </div><!-- /.row -->--}}
        {{--            </div><!-- /.container-fluid -->--}}
        {{--        </div>--}}
        <!-- /.content-header -->

        <!-- Main content -->
        {{--        <section class="content">--}}
        {{--            <div class="container-fluid">--}}
        {{--                <!-- Small boxes (Stat box) -->--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-lg-3 col-6">--}}
        {{--                        <!-- small box -->--}}
        {{--                        <div class="small-box bg-info">--}}
        {{--                            <div class="inner">--}}
        {{--                                <h3>150</h3>--}}

        {{--                                <p>New Orders</p>--}}
        {{--                            </div>--}}
        {{--                            <div class="icon">--}}
        {{--                                <i class="ion ion-bag"></i>--}}
        {{--                            </div>--}}
        {{--                            <a href="#" class="small-box-footer">More info <i--}}
        {{--                                    class="fas fa-arrow-circle-right"></i></a>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!-- ./col -->--}}
        {{--                    <div class="col-lg-3 col-6">--}}
        {{--                        <!-- small box -->--}}
        {{--                        <div class="small-box bg-success">--}}
        {{--                            <div class="inner">--}}
        {{--                                <h3>53<sup style="font-size: 20px">%</sup></h3>--}}

        {{--                                <p>Bounce Rate</p>--}}
        {{--                            </div>--}}
        {{--                            <div class="icon">--}}
        {{--                                <i class="ion ion-stats-bars"></i>--}}
        {{--                            </div>--}}
        {{--                            <a href="#" class="small-box-footer">More info <i--}}
        {{--                                    class="fas fa-arrow-circle-right"></i></a>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!-- ./col -->--}}
        {{--                    <div class="col-lg-3 col-6">--}}
        {{--                        <!-- small box -->--}}
        {{--                        <div class="small-box bg-warning">--}}
        {{--                            <div class="inner">--}}
        {{--                                <h3>44</h3>--}}

        {{--                                <p>User Registrations</p>--}}
        {{--                            </div>--}}
        {{--                            <div class="icon">--}}
        {{--                                <i class="ion ion-person-add"></i>--}}
        {{--                            </div>--}}
        {{--                            <a href="#" class="small-box-footer">More info <i--}}
        {{--                                    class="fas fa-arrow-circle-right"></i></a>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!-- ./col -->--}}
        {{--                    <div class="col-lg-3 col-6">--}}
        {{--                        <!-- small box -->--}}
        {{--                        <div class="small-box bg-danger">--}}
        {{--                            <div class="inner">--}}
        {{--                                <h3>65</h3>--}}

        {{--                                <p>Unique Visitors</p>--}}
        {{--                            </div>--}}
        {{--                            <div class="icon">--}}
        {{--                                <i class="ion ion-pie-graph"></i>--}}
        {{--                            </div>--}}
        {{--                            <a href="#" class="small-box-footer">More info <i--}}
        {{--                                    class="fas fa-arrow-circle-right"></i></a>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <!-- ./col -->--}}
        {{--                </div>--}}
        {{--                <!-- /.row -->--}}
        {{--            </div><!-- /.container-fluid -->--}}
        {{--        </section>--}}
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022-{{now()->format('Y')}} <a
                href="https://t.me/abdurashid_coder">Abdurashid</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 0.0.1
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('includes/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('includes/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('includes/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('includes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('includes/plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('includes/dist/js/adminlte.js')}}"></script>
@livewireScripts
@if(session()->has('success'))
    <script>
        toastr.success('{{ session('success') }}');
    </script>
@endif
<script>
    Livewire.on('toast', ({type, message}) => {
        toastr[type](message)
    })
</script>
@yield('scripts')
</body>

</html>
