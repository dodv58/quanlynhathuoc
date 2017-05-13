@extends('layouts.app')

@php
    $shipments = $data['shipments'];
    $saleHistories = $data['saleHistories'];
    $product = $data['product'];
    $totalSale = $data['totalSale'];
@endphp

@section('cssLib')
    {{-- add css here --}}
@endsection

@section('content')
    <div class="right_col" role="main">

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <!--<h3>Chi tiết sản phẩm</h3>-->
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="pull-left">
                                <h2>Tên sản phẩm: {{$product["name"]}}</h2>
                            </div>
                            <div class="pull-right">
                                {{--<button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Cập nhật</button>--}}
                                {{--<button class="btn btn-sm btn-warning"><i class="fa fa-lock"></i> Ngừng bán</button>--}}
                                {{--<button class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> Xóa</button>--}}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-12">
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content3" role="tab"
                                                                                  id="profile-tab2" data-toggle="tab"
                                                                                  aria-expanded="false">Tình trạng
                                                                                                        kho</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content2" role="tab"
                                                                            id="profile-tab" data-toggle="tab"
                                                                            aria-expanded="false">Lịch sử bán hàng</a>
                                        </li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade " id="tab_content2"
                                             aria-labelledby="profile-tab">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <ul class="stats-overview">
                                                    <li>
                                                        <span class="name"> Tổng đã bán </span>
                                                        <span class="value text-success"> {{$totalSale['total']}} </span>
                                                    </li>
                                                    <li>
                                                        <span class="name"> Bán trong tuần </span>
                                                        <span class="value text-success"> {{$totalSale['week']}} </span>
                                                    </li>
                                                    <li class="hidden-phone">
                                                        <span class="name"> Bán trong ngày </span>
                                                        <span class="value text-success"> {{$totalSale['today']}} </span>
                                                    </li>
                                                </ul>
                                                <br />

                                                <div id="mainb" style="height:350px; display: none"></div>

                                                <div>

                                                    <h4>Lịch sử bán hàng</h4>

                                                    <div class="table-responsive">
                                                        <table class="table table-striped jambo_table">
                                                            <thead>
                                                            <tr class="headings">
                                                                <th>#</th>
                                                                <th class="column-title">Người bán</th>
                                                                <th class="column-title">Lô/HSD</th>
                                                                <th class="column-title">Số lượng</th>
                                                                <th class="column-title">Giá bán</th>
                                                                <th class="column-title">Ngày giờ</th>
                                                                </th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @foreach($saleHistories as $saleHistory)
                                                                @php
                                                                    $classes = $loop->index % 2 === 0 ? "even" : "odd";
                                                                @endphp
                                                                <tr class="{{$classes}} pointer">
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$saleHistory['creator_name']}}</td>
                                                                    <td>{{\Carbon\Carbon::parse($saleHistory['expire_date'])->format('d-m-Y')}}</td>
                                                                    <td>{{$saleHistory['quantity']}}</td>
                                                                    <td>{{$saleHistory['sale_price']}}</td>
                                                                    <td>{{$saleHistory['created_at']}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    {{--<div class="row">--}}
                                                        {{--<div class="col-md-5 text-left">Hiển thị {{$saleHistories->firstItem()}} - {{$saleHistories->lastItem()}} trên tổng--}}
                                                                                        {{--số {{$saleHistories->total()}} hàng hóa--}}
                                                        {{--</div>--}}
                                                        {{--<div class="col-md-7 text-right">--}}
                                                            {{--<nav aria-label="Page navigation">--}}
                                                                {{--<ul class="pagination">--}}
                                                                    {{--{{$saleHistories->links()}}--}}
                                                                {{--</ul>--}}
                                                            {{--</nav>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                </div>

                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content3"
                                             aria-labelledby="profile-tab">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped jambo_table">
                                                        <thead>
                                                        <tr class="headings">
                                                            <th>#</th>
                                                            <th class="column-title">Ngày nhập</th>
                                                            <th class="column-title">HSD</th>
                                                            <th class="column-title">Còn lại</th>
                                                            </th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($shipments as $shipment)
                                                            @php
                                                                $classes = $loop->index % 2 === 0 ? "even" : "odd";
                                                            @endphp
                                                            <tr class="{{$classes}} pointer">
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$shipment['created_at']}}</td>
                                                                <td>{{$shipment['expire_date']}}</td>
                                                                <td>{{$shipment['quantity']}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                {{--<div class="row">--}}
                                                    {{--<div class="col-md-5 text-left">Hiển thị {{$shipments->firstItem()}} - {{$shipments->lastItem()}} trên tổng--}}
                                                                                    {{--số {{$shipments->total()}} hàng hóa--}}
                                                    {{--</div>--}}
                                                    {{--<div class="col-md-7 text-right">--}}
                                                        {{--<nav aria-label="Page navigation">--}}
                                                            {{--<ul class="pagination">--}}
                                                                {{--{{$shipments->links()}}--}}
                                                            {{--</ul>--}}
                                                        {{--</nav>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsLib')
    {{-- add js here--}}
@endsection
