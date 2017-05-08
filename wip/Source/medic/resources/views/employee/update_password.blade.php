{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: dodv2--}}
 {{--* Date: 5/6/2017--}}
 {{--* Time: 5:23 PM--}}
 {{--*/--}}

@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">

        <div class="clearfix"></div>
        @if(session()->has('success'))
        <div class="alert alert-success">
            Đã đổi mật khẩu!!!
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Đổi mật khẩu</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="change_password" method="POST" action="/change-password" data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="current_password">Mật khẩu hiện tại <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="current_password" name="current_password" required="required" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('current_password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="new_password">Mật khẩu mới <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="new_password" name="new_password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12" for="confirm_password">Xác nhận mật khẩu <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="confirm_password" data-validate-linked="new_password" name="confirm_password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-danger pull-right" data-dismiss="modal">Đổi mật khẩu</button>
                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('jsLib')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script !src="">
        $( "#change_password" ).validate({
            rules: {
                confirm_password: {
                    equalTo: "#new_password"
                }
            }
        });
    </script>
@endsection