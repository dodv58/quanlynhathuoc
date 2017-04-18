
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: dodv2--}}
 {{--* Date: 4/13/2017--}}
 {{--* Time: 1:59 PM--}}
 {{--*/--}}

@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Tạo hóa đơn</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>Tên thuốc hoặc mã vạch</h2>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input id="middle-name" class="form-control" type="text" name="serial">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <button class="btn btn-primary col-md-12 col-sm-12 col-xs-12" type="button">
                                    <i class="fa fa-plus"></i> Thêm thuốc
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Hóa đơn </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên thuốc</th>
                                    <th>Số lượng bán</th>
                                    <th>Giá bán</th>
                                    <th>Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>AAAAAAAAAAAAAAAAAAA</td>
                                    <td><input id="middle-name" class="form-control" type="text" name="serial" style="text-align:right" value="1"></td>
                                    <td>1000</td>
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>AAAAAAAAAAAAAAAAAAA</td>
                                    <td><input id="middle-name" class="form-control" type="text" name="serial" style="text-align:right" value="1"></td>
                                    <td>1000</td>
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>AAAAAAAAAAAAAAAAAAA</td>
                                    <td><input id="middle-name" class="form-control" type="text" name="serial" style="text-align:right" value="1"></td>
                                    <td>1000</td>
                                    <td>1000</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Tổng tiền </h2>
                                <h2 class="pull-right" style="color:red">3000</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="form-group">
                                    <label for="middle-name" class="control-label">Tiền phải trả</label>
                                    <label for="middle-name" class="control-label pull-right" style="padding-right: 15px">3000</label>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name" class="control-label">Khách đưa</label>
                                    <div class="pull-right">
                                        <input id="middle-name" class="form-control col-md-3" type="text" name="serial" style="text-align:right" value="10000">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label">Tiền thừa</label>
                                    <label for="middle-name" class="control-label pull-right" style="padding-right: 15px">6000</label>
                                </div>

                                <div class="form-group">

                                    <button class="btn btn-success col-md-2 pull-right" type="button">
                                        Thanh toán
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection