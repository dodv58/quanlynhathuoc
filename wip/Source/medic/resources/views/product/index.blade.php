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
                            <input type="text" class="form-control" placeholder="tên hàng, loại,..." id="txtFilterText"
                                   value="{{request('timkiem')}}">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button" id="btnSearch">Tìm!</button>
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
                                <a href="/product/add-stocks">
                                    <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Nhập kho</button>
                                </a>
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
                                <select class="form-control pull-left filter" name="" id="ddlFilterType">
                                    <option value="">-- Loại hàng --</option>
                                    @foreach($categories as $category)
                                        @php
                                            $selected = !empty(request('loai')) && $category->id == request('loai') ? 'selected' : '';
                                        @endphp
                                        <option value="{{$category->id}}" {{$selected}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control pull-left filter" name="" id="ddlFilterStatus">
                                    <option value="">-- Tình trạng --</option>
                                    <option value="1" @php if(request('tinhtrang') == 1) echo 'selected'; @endphp >Còn
                                                                                                                   hàng
                                    </option>
                                    <option value="2" @php if(request('tinhtrang') == 2) echo 'selected'; @endphp >Hết
                                                                                                                   hàng
                                    </option>
                                    <option value="3" @php if(request('tinhtrang') == 3) echo 'selected'; @endphp >Gần hết
                                                                                                                   hàng
                                    </option>
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
                                        {{--<th>--}}
                                        {{--<input type="checkbox" id="check-all" class="flat">--}}
                                        {{--</th>--}}
                                        <th class="column-title">#</th>
                                        <th class="column-title">Tên hàng</th>
                                        <th class="column-title">Loại hàng</th>
                                        <th class="column-title">Tồn kho</th>
                                        <th class="column-title">Tối thiểu</th>
                                        <th class="column-title">Đơn vị</th>
                                        <th class="column-title no-link last"><span class="nobr">Action</span>
                                        </th>
                                        {{--<th class="bulk-actions" colspan="7">--}}
                                        {{--<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span--}}
                                        {{--class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>--}}
                                        {{--</th>--}}
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($products as $product)
                                        @php
                                            $classes = $loop->index % 2 === 0 ? 'even' : 'odd';
                                            $classes .= ($product['quantity'] < $product['min_quantity']) ? ' text-danger' : '';
                                            $index = $products->firstItem() + $loop->index;
                                        @endphp
                                        <tr class="{{$classes}} pointer">
                                            {{--<td class="a-center">--}}
                                            {{--<input type="checkbox" class="flat" name="table_records">--}}
                                            {{--</td>--}}
                                            <td class=" "><b>{{$index}}</b></td>
                                            <td class=" ">{{$product['name']}}</td>
                                            <td class=" ">{{$product['category_name']}}</td>
                                            <td class=" ">{{$product['quantity']}}</td>
                                            <td class=" ">{{$product['min_quantity']}}</td>
                                            <td class=" ">{{$product['unit']}}</td>
                                            <td class="last">
                                                <a href="{{url('product/detail/' . $product['id'])}}"
                                                   class="btn btn-xs btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-xs btn-success edit-product"
                                                   data-id="{{$product['id']}}"
                                                   data-categoryid="{{$product['category_id']}}"
                                                   data-minquantity="{{$product['min_quantity']}}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-5 text-left">Hiển thị {{$products->firstItem()}}
                                                                - {{$products->lastItem()}} trên tổng
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
    <!-- Modals -->
    <div id="editProduct" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="editForm" method="post" action="{{url('product/edit')}}" class="form-horizontal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Chỉnh sửa</h4>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" name="productId" id="txtEditProductId">
                        <div class="form-group">
                            <label for="productCode" class="control-label col-md-3 col-sm-3 col-xs-12">
                                Danh mục
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="form-control" name="categoryId" id="ddlEditCategoryId">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="drug-">Giới hạn số lượng
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" id="txtEditMinQuantity" name="minQuantity"
                                       required
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('jsLib')
    {{-- add js here--}}
    <script>
        var editProductValidation = $("#editForm").validate({
            rules: {
                minQuantity: {
                    required: true,
                    digits: true
                }
            }
        });

        function filter() {
            var search = $.trim($("#txtFilterText").val());
            var type = $("#ddlFilterType").val();
            var status = $("#ddlFilterStatus").val();

            var query = '';
            if (search != null && search != '') {
                query += ('?timkiem=' + search);
            }
            if (type != '') {
                query += (query != '' ? '&loai=' + type : '?loai=' + type);
            }
            if (status != '') {
                query += (query != '' ? '&tinhtrang=' + status : '?tinhtrang=' + status);
            }

            location.href = '/product' + query;
        }
        $(".filter").change(function (e) {
            filter();
        });
        $("#btnSearch").click(function () {
            filter();
        });
        $("#txtFilterText").keypress(function (ev) {
            var keyCode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keyCode == '13') {
                filter();
            }
        })

        $(".edit-product").click(function (e) {
            var productId = $(this).data('id');
            var categoryId = $(this).data('categoryid');
            var minQuantity = $(this).data('minquantity');
            $("#txtEditProductId").val(productId);
            $("#txtEditMinQuantity").val(minQuantity);
            $("#ddlEditCategoryId").val(categoryId);
            $("#editProduct").modal('show');
        });

        $('#editProduct').on('hidden.bs.modal', function () {
            editProductValidation.resetForm();
            $("#editForm").find('.error').removeClass('error');
        });
    </script>
@endsection
