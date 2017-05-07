
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: dodv2--}}
 {{--* Date: 4/9/2017--}}
 {{--* Time: 7:08 PM--}}
 {{--*/--}}

@extends('layouts.app')

@section('content')

    <div class="right_col" role="main">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cập nhật thông tin</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Họ tên</label>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" readonly="readonly" placeholder="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Account</label>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" readonly="readonly" placeholder={{ $user->account }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" readonly="readonly" placeholder={{ $user->email }}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Giới tính</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male"> &nbsp; Nam &nbsp;
                                        </label>
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female"> Nữ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày sinh <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" pattern="[0-9-/]+" required="required" type="text" value="{{ $user->birthday }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agency">Chi nhánh <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="agency" name="agency" required="required">
                                        @foreach(\App\Models\SubPharmacy::where('pharmacy_id', auth()->user()->pharmacy_id)->get() as $agency)
                                            <option>{{ $agency->name }}</option>
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
                                    <select class="form-control" id="role" required="required">
                                        <option value="manager">Nhân viên</option>
                                        <option value="employee">Quản lý</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Địa chỉ</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="address" name="address" class="form-control col-md-7 col-xs-12" value="{{ $user->address }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Số điện thoại</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="phone" name="phone" pattern="[0-9+].{9,}" class="form-control col-md-7 col-xs-12" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                                    <button class="btn btn-primary" type="button" onclick="window.location.href='/employee/'" >Hủy</button>
                                    <button type="submit" onclick="window.location.href='/employee/{{ $user->account }}/edit'" class="btn btn-success">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection