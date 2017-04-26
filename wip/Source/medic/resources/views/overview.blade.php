{{----}}
{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: dodv2--}}
{{--* Date: 4/24/2017--}}
{{--* Time: 9:24 PM--}}
{{--*/--}}

@extends('layouts.app')
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
                                <span>April 01, 2017 - April 23, 2017   </span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div id="chart_plot_01" class="demo-placeholder">
                                {!! $chartjs->render() !!}
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                        <div class="x_title">
                            <h2>Doanh thu theo chi nhánh</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-6">
                            <div>
                                <p>Chi nhánh Cầu Giấy</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar " role="progressbar" data-transitiongoal="80"></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Chi nhánh Hai Bà Trưng</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar " role="progressbar" data-transitiongoal="60"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-6">
                            <div>
                                <p>Chi Nhánh Đống Đa</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar " role="progressbar" data-transitiongoal="40"></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Chi Nhánh Thành Công</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar " role="progressbar" data-transitiongoal="50"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td class="text-danger">Progesterone (dạng hạt mịn)
                                </td>
                                <td class="text-danger">23/02/2018</td>
                                <td class="text-danger">0</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Methyl prednisolon
                                </td>
                                <td>5/6/2018</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Glycerol
                                </td>
                                <td>12/12/2017</td>
                                <td>60</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Omeprazol 20mg
                                </td>
                                <td>01/12/2017</td>
                                <td>60</td>
                            </tr>
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
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th class="text-danger" scope="row">1</th>
                                <td class="text-danger">Omeprazol
                                </td>
                                <td class="text-danger">23/03/2017</td>
                                <td class="text-danger">16</td>
                            </tr>
                            <tr>
                                <th class="text-danger" scope="row">2</th>
                                <td class="text-danger">Piperacilin
                                </td>
                                <td class="text-danger">5/4/2017</td>
                                <td class="text-danger">100</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Ceftazidim 500g
                                </td>
                                <td>12/06/2017</td>
                                <td>60</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Paracetamol (acetaminophen)
                                </td>
                                <td>01/07/2017</td>
                                <td>100</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection

@section('jsLib')
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
@endsection