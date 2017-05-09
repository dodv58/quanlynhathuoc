{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: dodv2--}}
 {{--* Date: 4/12/2017--}}
 {{--* Time: 2:12 PM--}}
 {{--*/--}}

@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3 class="text-uppercase">CHI NHÁNH {{ $agency->name }} </h3>
                </div>
                <div class="title_right pull-right">
                    <h3><small>Địa chỉ {{ $agency->address }} - SĐT: {{ $agency->phone }}</small> </h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="dashboard_graph">
                        <div class="row x_title">
                            <h2>Doanh thu </h2>
                            <div class="col-md-6 pull-right">
                                <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>April 01, 2014 - April 23, 2015</span> <b class="caret"></b>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content1 ">
                            <div id="graph_bar_group" style="width:95%;">
                                {!! $chartjs->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Nhân viên chi nhánh {{ $agency->name }}</h2>
                            <div class="nav navbar-right">
                                <a href="/agency/{{ $agency->id }}/addemployee"><button type="button" class="btn btn-dark"> Thêm nhân viên</button></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ tên</th>
                                    <th>Tài khoản</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $index => $employee)
                                    <tr>
                                        <th scope="row">{{ $index + 1}}</th>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->account }}</td>
                                        <th>{{ $employee->phone }}</th>
                                        <th>{{ $employee->email }}</th>
                                        <th>@if($employee->role == 1) Quản lý @else Nhân viên @endif</th>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection


@section('jsLib')
    <script src="{{ asset('vendors/bower_components/bootstrap-progressbar/bootstrap-progressbar.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>

@endsection