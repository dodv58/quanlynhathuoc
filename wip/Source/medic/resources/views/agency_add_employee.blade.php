{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: dodv2--}}
 {{--* Date: 4/12/2017--}}
 {{--* Time: 9:52 PM--}}
 {{--*/--}}

@extends('layouts.app')
@section('content')
    <div class="right_col" role="main">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm nhân viên cho chi nhánh {{ $agency->name }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id="employee_list">
                        <br />
                        <table class="table">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="checkAll" class="flat" > Chọn</th>
                                <th>Nhân viên</th>
                                <th>Account</th>
                                <th>Chi nhánh</th>
                                <th>Giờ làm việc</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th><input type="checkbox" name="{{ $user->account }}" class="flat" @if($user->sub_pharmacy_id == $agency->id) checked disabled="disabled" @endif></th>
                                    <td><a href="#">{{ $user->name }}</a></td>
                                    <td>{{ $user->account }}</td>
                                    <td>{{ \App\Models\SubPharmacy::find($user->sub_pharmacy_id)->name }}</td>
                                    <td>8:00 - 12:00</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-12 col-xs-12 pull-right">
                                <button type="submit" id="add-btn" class="btn btn-success pull-right">Thêm</button>
                                <button class="btn btn-primary pull-right" onclick="window.location.href='/agency/{{ $agency->id }}'" type="button">Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script !src="">

        $('#add-btn').on('click', function () {
            var selected = []
            $('#employee_list input:checked').each(function () {
                if(! $(this).is(':disabled')) {
                    selected.push($(this).attr('name'));
                }
            })
            $.ajax({
                type: "get",
                url: '/agencyAddEmployee/{{ $agency->id }}',
                data: {
                    selected : selected
                },
                cache : false,
                success : function(data) {
                    window.location.href = '/agency/'+$.trim(data);
                }
            });
        })

        $("#checkAll").on('click', function () {
            $('input:checkbox').not(':disabled').prop('checked', this.checked);
        });

    </script>
@endsection