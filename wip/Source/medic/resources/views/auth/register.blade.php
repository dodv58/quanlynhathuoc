@extends('layouts.app-default')
@section('cssLib')
    <style>
        .ln_solid {
            border-top: 1px solid #e5e5e5;
            color: #ffffff;
            background-color: #ffffff;
            height: 1px;
            margin: 20px 0
        }
    </style>
@endsection
@section('content')
<div class="container body">
    <div class="main_container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Đăng ký</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Họ Tên</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" maxlength="191" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div id="account-form-group" class="form-group{{ $errors->has('account') ? ' has-error' : '' }}">

                                <label for="account" class="col-md-4 control-label">Tài khoản</label>

                                <div class="col-md-6">
                                    <input id="account" type="text" class="form-control" name="account" maxlength="191" required autofocus>
                                    {{--<input type="text" id="account" name="account" pattern="[A-Za-z0-9_]+" required="required" class="form-control col-md-7 col-xs-12">--}}
                                    <span class="pull-right text-danger" id="account-feedback"></span>
                                    @if ($errors->has('account'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('account') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Địa chỉ E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="191" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Mật khẩu</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" maxlength="191" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Xác nhận mật khẩu</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" maxlength="191" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Số điện thoại</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" maxlength="15" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Địa chỉ</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" maxlength="191" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            {{--<div class="panel-heading">Thông tin nhà thuốc</div>--}}
                            <h5>Thông tin nhà thuốc</h5>

                            <div class="form-group{{ $errors->has('pharmacy-name') ? ' has-error' : '' }}">
                                <label for="pharmacy-name" class="col-md-4 control-label">Tên nhà thuốc</label>

                                <div class="col-md-6">
                                    <input id="pharmacy-name" type="text" class="form-control" name="pharmacy-name" value="{{ old('pharmacy-name') }}" maxlength="45" required autofocus>

                                    @if ($errors->has('pharmacy-name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pharmacy-name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('pharmacy-phone') ? ' has-error' : '' }}">
                                <label for="pharmacy-phone" class="col-md-4 control-label">Số điện thoại</label>

                                <div class="col-md-6">
                                    <input id="pharmacy-phone" type="text" class="form-control" name="pharmacy-phone" value="{{ old('pharmacy-phone') }}" maxlength="15" required autofocus>

                                    @if ($errors->has('pharmacy-phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pharmacy-phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('pharmacy-address') ? ' has-error' : '' }}">
                                <label for="pharmacy-address" class="col-md-4 control-label">Địa chỉ</label>

                                <div class="col-md-6">
                                    <input id="pharmacy-address" type="text" class="form-control" name="pharmacy-address" value="{{ old('address') }}" maxlength="191" required autofocus>

                                    @if ($errors->has('pharmacy-address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pharmacy-address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Đăng ký
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#account').on('change', function () {
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
        });
    })



</script>

@endsection