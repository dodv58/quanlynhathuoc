{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: dodv2--}}
 {{--* Date: 4/8/2017--}}
 {{--* Time: 4:16 PM--}}
 {{--*/--}}


@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm nhân viên</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="add_employee" method="POST" action="/employee" data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Họ tên <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group " id="account-form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="account">Tài khoản <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="account" name="account" pattern="[A-Za-z0-9_]+" required="required" class="form-control col-md-7 col-xs-12">
                                    <span class="pull-right text-danger" id="account-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12 " >Giới tính</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male"> &nbsp; Nam &nbsp;
                                        </label>
                                        <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female" checked> Nữ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" name="birthday" pattern="[0-9-/]+"
                                           class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" placeholder="DD-MM-YYYY">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agency">Chi nhánh <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="agency" name="agency" required="required">
                                        @foreach(\App\Models\SubPharmacy::where('pharmacy_id', auth()->user()->pharmacy_id)->get() as $agency)
                                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Giờ làm việc: <span class="required">*</span>--}}
                                {{--</label>--}}
                                {{--<div class="col-md-2 col-sm-3 col-xs-5">--}}
                                    {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                {{--</div>--}}
                                {{--<label class="control-label col-md-2 col-sm-2 col-xs-2" style="text-align:center">-</label>--}}
                                {{--<div class="col-md-2 col-sm-3 col-xs-5">--}}
                                    {{--<input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Vai trò <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="role" name="role" required="required">
                                        <option value="manager">Nhân viên</option>
                                        <option value="employee">Quản lý</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Địa chỉ</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="address" name="address" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Số điện thoại</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="phone" name="phone" pattern="[0-9+]+" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <button type="submit" class="btn btn-success pull-right">Thêm</button>
                                    <button class="btn btn-primary pull-right" onclick="window.location.href='http://medic.app/employee'" type="button">Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script !src="">
            $('#account').on('change', (function () {
                var txt = $('#account').val();

                $.ajax({
                    type: "get",
                    url: '/employee/check-employee-existed',
                    data: {
                        txt: txt
                    },
                    cache: false,
                    success: function (data) {
                        if(data == 1){
                            $('#account-form-group').removeClass('has-success').addClass('has-error')
                            $('#account-feedback').html('Tài khoản đã tồn tại!')
                        }
                        else {
                            $('#account-form-group').removeClass('has-error').addClass('has-success')
                            $('#account-feedback').html('')
                        }
                    }
                });
            }));

            $('#add_employee').validate({
                rules: {
                    birthday: {
                        date: true
                    }
                }
            });
    </script>

@endsection
