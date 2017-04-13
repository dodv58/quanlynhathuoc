@extends('layouts.app')

@section('cssLib')
    {{-- add css here --}}
@endsection

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Nhập hàng</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thông tin thuốc</h2>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="form-add-product" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="drug-">Tên Thuốc
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="txtProductName" name="productName"
                                                   required="required"
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="productCode" class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Mã vạch
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="categoryId" id="ddlCategoryId">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputUnit">
                                            Đơn vị nhập <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" id="ddlInputUnit" name="inputUnit">
                                                <option value="Hộp">Hộp</option>
                                                <option value="Vỉ">Vỉ</option>
                                                <option value="Viên">Viên</option>
                                                <option value="Tuýp">Tuýp</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddlSaleUnit">
                                            Đơn vị bán <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" id="ddlSaleUnit" name="saleUnit">
                                                <option value="Hộp">Hộp</option>
                                                <option value="Vỉ">Vỉ</option>
                                                <option value="Viên">Viên</option>
                                                <option value="Tuýp">Tuýp</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exchangeValue">
                                            Quy đổi <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="txtExchangeValue" name="exchangeValue"
                                                   required="required"
                                                   class="form-control col-md-7 col-xs-12"
                                                   placeholder="Từ đơn vị nhập ra đơn vị bán">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Số lượng<span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="txtQuantity" required="required"
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inputPrice">
                                            Giá nhập <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="txtInputPrice" name="inputPrice" required="required"
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtSalePrice">
                                            Giá bán <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="txtSalePrice" name="salePrice"
                                                   required="required"
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Ngày sản xuất
                                        </label>
                                        <div class="col-md-6 xdisplay_inputx has-feedback ">
                                            <input type="text" class="form-control has-feedback-left date-picker"
                                                   id="txtManufacturedDate" name="manufacturedDate">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="productExpireDate"
                                               class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Ngày hết hạn</label>
                                        <div class="col-md-6 xdisplay_inputx has-feedback">
                                            <input type="text" class="form-control has-feedback-left date-picker"
                                                   id="txtExpireDate" name="expireDate">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-danger" type="button" id="btnClear">Hủy</button>
                                        <button type="button" id="btnAddProduct" class="btn btn-success">Thêm thuốc
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thuốc nhập kho </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table" id="productTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên thuốc</th>
                                    <th>Đơn vị nhập</th>
                                    <th>Đơn vị bán</th>
                                    <th>Số lượng nhập</th>
                                    <th>Giá nhập</th>
                                    <th>Giá bán</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="8">Chưa có thuốc được thêm</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="ln_solid"></div>
                            <div class="col-md-5 col-sm-12 col-xs-12 pull-right">
                                <form action="{{url('product/add-stocks')}}" method="post"
                                      class="form-horizontal form-label-left">
                                    {{csrf_field()}}
                                    <input type="hidden" id="txtProducts" name="products" value="">
                                    <div class="form-group">
                                        <label for="middle-name"
                                               class="control-label col-md-4 col-sm-4 col-xs-12 pull-left">
                                            Tổng tiền </label>
                                        <label for="middle-name"
                                               class="control-label col-md-6 col-sm-6 col-xs-12 pull-right"
                                               style="color: red">3000</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name"
                                               class="control-label col-md-4 col-sm-4 col-xs-12 pull-left">
                                            Ngày làm việc </label>
                                        <div class="col-md-6 xdisplay_inputx form-group has-feedback-left pull-right">
                                            <input type="text" readonly
                                                   class="text-right form-control has-feedback-left"
                                                   id="" value="{{Carbon\Carbon::today()->format("d-m-Y")}}">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success col-md-3 pull-right" type="submit">
                                            Nhập Kho
                                        </button>
                                        <button class="btn btn-danger col-md-3 pull-right" type="button">
                                            Xóa toàn bộ
                                        </button>
                                    </div>
                                </form>
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
    <script src="{{ asset('vendors/jquery-autocomplete/jquery.autocomplete.js') }}"></script>
    <script>
                {{--var suggestion = {!! $suggestion !!};--}}
        var products = [];
        $("#btnAddProduct").click(function (e) {
            var product = {};
            product["name"] = $("#txtProductName").val();
            product["category_id"] = $("#ddlCategoryId").val();
            product["input_unit"] = $("#ddlInputUnit").val();
            product["sale_unit"] = $("#ddlSaleUnit").val();
            product["exchange_value"] = $("#txtExchangeValue").val();
            product["quantity"] = $("#txtQuantity").val();
            product["input_price"] = $("#txtInputPrice").val();
            product["sale_price"] = $("#txtSalePrice").val();
            product["manufactured_date"] = $("#txtManufacturedDate").val();
            product["expire_date"] = $("#txtExpireDate").val();

            if (products.length === 0) {
                $("table#productTable tbody").html("");
            }
            $("table#productTable tbody").append(createProductRowHtml(product, products.length + 1));
            products.push(product);
            $("#txtProducts").val(JSON.stringify(products));
        });

        function createProductRowHtml(product, index) {
            var html = '<tr>';
            html += '<th scope="row">' + index + '</th>';
            html += '<td>' + product["name"] + '</td>';
            html += '<td>' + product["input_unit"] + '</td>';
            html += '<td>' + product["sale_unit"] + '</td>';
            html += '<td>' + product["quantity"] + '</td>';
            html += '<td>' + product["input_price"] + '</td>';
            html += '<td>' + product["sale_price"] + '</td>';
            html += '<td>Xóa</td>';
            html += '</tr>';

            return html;
        }

        $('#txtProductName').autocomplete({
            serviceUrl: '/product/suggest-products',
            paramName: 'searchString',
            transformResult: function (response) {
                response = JSON.parse(response);
                return {
                    suggestions: $.map(response, function (dataItem) {
                        return {value: dataItem.name, data: dataItem};
                    })
                };
            },
            onSelect: function (suggestion) {
                //suggestion.object contain all values pass thru, no need to call again
                $("#txtSalePrice").val(suggestion.data.price);
                $("#ddlCategoryId").val(suggestion.data.category_id);
            }
        });

        function init_daterangepicker() {

            if (typeof ($.fn.daterangepicker) === 'undefined') {
                return;
            }
            console.log('init_daterangepicker');

            $('.date-picker').daterangepicker({
                singleDatePicker: true,
                singleClasses: "picker_1",
                locale: {
                    format: 'DD-MM-YYYY'
                }
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        }

        init_daterangepicker();
    </script>
@endsection
