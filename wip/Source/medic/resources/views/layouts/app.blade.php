<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/pace/pace.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/sweet-alert/sweetalert.css') }}" rel="stylesheet">

    @yield('cssLib')
    {{-- Custom Theme Style --}}
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ url('/home') }}" class="site_title"><i class="fa fa-medkit"></i>
                        <span>@if(Auth::check() && \App\Models\Pharmacy::find(auth()->user()->pharmacy_id))
                                {{ \App\Models\Pharmacy::find(auth()->user()->pharmacy_id)->name }}
                            @endif</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Xin chào,</span>
                        @if(Auth::check())
                            <h2>{{ auth()->user()->name }}</h2>
                        @endif
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        @if(auth()->user()->role == 1)
                        <ul class="nav side-menu">
                            <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Tổng quan <span
                                            class="nav child_menu"></span></a>
                            </li>
                            {{--<li><a><i class="fa fa-line-chart"></i> Báo cáo <span class="nav child_menu"></span></a>--}}
                            {{--</li>--}}
                            <li><a href="/product"><i class="fa fa-archive"></i> Kho <span class="nav child_menu"></span></a>
                            </li>
                            <li><a><i class="fa fa-bank"></i> Chi nhánh <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    @foreach(\App\Models\SubPharmacy::where('pharmacy_id', auth()->user()->pharmacy_id)->get()  as $agency)
                                        <li><a href="/agency/{{ $agency->id }}">Chi nhánh {{ $agency->name }}</a></li>
                                    @endforeach

                                    <li><a href="/agency/add"><i class="fa fa-plus"></i>Thêm chi nhánh</a></li>
                                </ul>
                            </li>
                            <li><a href="/employee"><i class="fa fa-users"></i> Nhân viên <span class="nav child_menu"></span></a>
                            </li>
                            <li><a href="/product/sale"><i class="fa fa-calculator"></i> Bán hàng <span class="nav child_menu"></span></a>
                            </li>
                            {{--<li><a><i class="fa fa-cog"></i> Thiết lập <span class="nav child_menu"></span></a>--}}
                            {{--</li>--}}
                        </ul>
                        @else
                            <ul class="nav side-menu">
                                <li><a href="/product/sale"><i class="fa fa-clone"></i> Bán hàng <span class="nav child_menu"></span></a>
                                </li>
                                <li><a href="/product"><i class="fa fa-clone"></i> Kho <span class="nav child_menu"></span></a>
                                </li>
                                {{--<li><a><i class="fa fa-cog"></i> Thiết lập <span class="nav child_menu"></span></a>--}}
                                {{--</li>--}}
                            </ul>
                        @endif
                    </div>
                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            @if(Auth::check())
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <img src="{{asset('images/img.jpg')}}" alt="">{{ auth()->user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="/profile"> Thông tin cá nhân</a></li>
                                    <li>
                                        <a href="/change-password">
                                            <span>Đổi mật khẩu</span>
                                        </a>
                                    </li>
                                    <li><a href="{{route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a>
                                    </li>
                                </ul>
                            @endif
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->


        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Quản lý nhà thuốc - by <a href="javascript:;"> HT team</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('vendors/pace/pace.min.js') }}"></script>
<script src="{{ asset('vendors/moment/moment.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendors/sweet-alert/sweetalert.js') }}"></script>

@yield('jsLib')
{{-- Custom Theme Scripts --}}
<script src="{{ asset('js/common.js') }}"></script>
</body>
</html>
