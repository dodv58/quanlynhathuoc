{{----}}
{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: dodv2--}}
{{--* Date: 4/24/2017--}}
{{--* Time: 9:24 PM--}}
{{--*/--}}

@extends('layouts.app')
@php
    $startOfMonth = \Carbon\Carbon::now()->startOfMonth()->format('d/m/Y');
    $endOfMonth = \Carbon\Carbon::now()->endOfMonth()->format('d/m/Y');
@endphp
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <div class="right_col" role="main">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">
                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Báo cáo tổng quan </h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>{{$startOfMonth . ' - ' . $endOfMonth}}</span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                            {!! $chartjs->render() !!}
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                        <div class="x_title">
                            <h2>Doanh thu theo chi nhánh</h2>
                            <div class="clearfix"></div>
                        </div>


                        @foreach($revenueOfAgencies as $revenue)
                            @if (($loop->iteration % 2) == 1)
                                <div class="col-md-12 col-sm-12 col-xs-6">
                                    @endif

                                    <div>
                                        <p>{{$revenue['name']}} : {{$revenue['total']}}</p>
                                        <div class="">
                                            <div class="progress progress_sm" style="width: 76%;">
                                                <div class="progress-bar " role="progressbar"
                                                     data-transitiongoal="{{$revenue['total'] / $totalRevenue * 100}}"></div>
                                            </div>
                                        </div>
                                    </div>

                                    @if (($loop->iteration % 2) == 0 || $loop->last)
                                </div>
                            @endif
                        @endforeach


                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <br />

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thuốc sắp hết hàng</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên thuốc</th>
                                <th>Số lượng</th>
                                <th>Đơn vị</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($outStockProducts as $product)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$product['name']}}</td>
                                    <td>{{$product['quantity']}}</td>
                                    <td>{{$product['unit']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thuốc sắp hết hạn</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên thuốc</th>
                                <th>Hạn sử dụng</th>
                                <th>Số lượng</th>
                                <th>Đơn vị</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($expireProducts as $product)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$product['name']}}</td>
                                    <td>{{\Carbon\Carbon::parse($product['expire_date'])->format('d-m-Y')}}</td>
                                    <td>{{$product['quantity']}}</td>
                                    <td>{{$product['unit']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection

@section('jsLib')
    <script src="{{ asset('vendors/bower_components/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
@endsection