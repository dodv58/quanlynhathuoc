{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: dodv2--}}
 {{--* Date: 4/8/2017--}}
 {{--* Time: 11:41 AM--}}
 {{--*/--}}

@extends('layouts.app')

@section('content')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Quản lý nhân viên</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>Tìm kiếm</h2>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <input id="middle-name" class="form-control" type="text" name="serial">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <button class="btn btn-primary col-md-12 col-sm-12 col-xs-12" type="button">
                                    Tìm
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
                            <h2>Nhân viên</h2>
                            <div class="nav navbar-right">
                                <a href="/employee/add"><button type="button" class="btn btn-dark"> Thêm nhân viên</button></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nhân viên</th>
                                    <th>Tài khoản</th>
                                    <th>Chi nhánh</th>
                                    <th>Số điện thoại</th>
                                    <th class="column-title no-link last" width="150"><span class="nobr">Chỉnh sửa/ Xóa</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $index => $user)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td><a href="">{{ $user->name }}</a></td>
                                        <td>{{ $user->account }}</td>
                                        <td> @if(\App\Models\SubPharmacy::find($user->sub_pharmacy_id)){{ \App\Models\SubPharmacy::find($user->sub_pharmacy_id)->name }} @endif</td>
                                        <td>{{ $user->phone }}</td>
                                        <td class="last">
                                            <a href="/employee/{{ $user->account }}/edit" class="btn btn-xs btn-info">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="#" class="btn btn-xs btn-danger" data-name="{{ $user->name }}" data-account="{{ $user->account }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>


                </div>

            </div>

        </div>
        {{--modal--}}
        <div class="modal fade" id="confirm-modal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-danger">Xóa nhân viên</h4>
                    </div>
                    <div class="modal-body">
                        <p  id="del-modal-body"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="delete-btn" class="btn btn-danger" data-dismiss="modal">Xóa</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>

        $('.btn-danger:not(#delete-btn)').on('click', function () {
            var name = $(this).data('name');
            var account = $(this).data('account');
            $('#del-modal-body').html('Bạn muốn xóa nhân viên <Strong>' +  name + '</strong> khỏi nhà thuốc?');
            $('#delete-btn').attr('account', account);
            $('#confirm-modal').modal("show");
        });

        $('#delete-btn').on('click', function () {
            var account = $(this).attr('account');
            document.location.href="/employee/" + account;
        })

    </script>
@endsection