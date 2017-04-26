@extends('layouts.app')

@php
    $products = $data['products'];
    $categories = $data['categories'];
@endphp

@section('cssLib')
    {{-- add css here --}}
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Quản lý hàng hóa</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="tên hàng, loại,...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Tìm!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="pull-left">
                                <h2>Hàng hóa</h2>
                            </div>
                            <div class="pull-right">
                                <a href="/product/add-stocks"><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Nhập kho</button></a>
                                <button class="btn btn-sm btn-success"><i class="fa fa-sign-out"></i> Xuất file</button>
                                <!--<button class="btn btn-sm btn-success">
                                  <i class="fa fa-list"></i> <i class="fa fa-caret-up"></i>
                                </button>-->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-inline" style="padding: 1px 5px 6px">
                            <div class="form-group" style="margin-right: 10px">
                                <label class="control-label" style="font-size: 16px">Lọc theo</label>
                            </div>
                            <div class="form-group">
                                <select class="form-control pull-left" name="" id="">
                                    <option value="">-- Loại hàng --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control pull-left" name="" id="">
                                    <option value="">-- Tình trạng --</option>
                                    <option value="">Còn hàng</option>
                                    <option value="">Hết hàng</option>
                                </select>
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<select class="form-control pull-left" name="" id="">--}}
                            {{--<option value="">Hàng đang kinh doanh</option>--}}
                            {{--<option value="">Hàng ngừng kinh doanh</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                        </th>
                                        <th class="column-title">Tên hàng</th>
                                        <th class="column-title">Loại hàng</th>
                                        <th class="column-title">Tồn kho</th>
                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                                        class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($products as $product)
                                        @php
                                            $classes = $loop->index % 2 === 0 ? "even" : "odd";
                                        @endphp
                                        <tr class="{{$classes}} pointer">
                                            <td class="a-center">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">{{$product["name"]}}</td>
                                            <td class=" ">{{$product["category_name"]}}</td>
                                            <td class=" ">{{$product["quantity"]}}</td>
                                            <td class="last">
                                                <a href="#" class="btn btn-xs btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-5 text-left">Hiển thị {{$products->firstItem()}} - {{$products->lastItem()}} trên tổng
                                                                số {{$products->total()}} hàng hóa
                                </div>
                                <div class="col-md-7 text-right">
                                    <nav aria-label="Page navigation">
                                        {{$products->links()}}
                                    </nav>
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
