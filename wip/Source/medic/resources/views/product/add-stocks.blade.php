@extends('layouts.app')

@section('cssLib')
    {{-- add css here --}}
    <style>
        body {
            counter-reset: Serial; /* Set the Serial counter to 0 */
        }

        tbody tr th:first-child:before {
            counter-increment: Serial; /* Increment the Serial counter */
            content: counter(Serial); /* Display the counter */
        }
    </style>
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
                            <form id="form-add-product" data-parsley-validate class="form-horizontal form-label-left"
                                  novalidate>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="drug-">Tên Thuốc
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="txtProductName" name="productName"
                                                   required
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
                                            <input type="text" id="txtQuantity" required="required" name="quantity"
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
                                        <button class="btn btn-danger" type="reset" id="btnClear">Hủy</button>
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
                                <form id="form-add-stock" action="{{url('product/add-stocks')}}" method="post"
                                      class="form-horizontal form-label-left">
                                    {{csrf_field()}}
                                    <input type="hidden" id="txtProducts" name="products" value="">
                                    <div class="form-group">
                                        <label for="middle-name"
                                               class="control-label col-md-4 col-sm-4 col-xs-12 pull-left">
                                            Tổng tiền </label>
                                        <label for="middle-name" id="lbTotalAmount"
                                               class="control-label col-md-6 col-sm-6 col-xs-12 pull-right"
                                               style="color: red">0</label>
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
                                        <button class="btn btn-success col-md-3 pull-right" type="button"
                                                id="btnSubmitStock">
                                            Nhập Kho
                                        </button>
                                        <button class="btn btn-danger col-md-3 pull-right" type="button" id="btnRemoveAll">
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
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    <script>

        var addProductValidator = $("#form-add-product").validate({
            rules: {
                productName: {
                    required: true
                },
                exchangeValue: {
                    required: true,
                    digits: true
                },
                quantity: {
                    required: true,
                    digits: true
                },
                inputPrice: {
                    required: true,
                    digits: true
                },
                salePrice: {
                    required: true,
                    digits: true
                }
            }
        });
        var products = [];
        var totalAmount = 0;
        $("#btnAddProduct").click(function (e) {
            if ($('#form-add-product').valid()) {
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
                $("table#productTable tbody").append(createProductRowHtml(product));
                totalAmount += product["input_price"] * product["quantity"];
                updateTotalAmount(totalAmount);
                products.push(product);
                updateProductInput();
                resetAddForm();
            }

        });

        $("#btnClear").click(function (e) {
            resetAddForm();
        });

        $("#btnSubmitStock").click(function (e) {
            if (products.length === 0) {
                swal({
                    title: "Lỗi",
                    text: "Không có sản phẩm nhập kho",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: "Thêm sản phẩm",
                    closeOnConfirm: false
                });
                return;
            }
            swal({
                    title: "Xác nhận nhập kho",
//                    text: "Tạo phiếu nhập kho",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hủy bỏ",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Đồng ý",
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $("#form-add-stock").submit();
                    }
                });
        });

        function resetAddForm() {
            addProductValidator.resetForm();
            $("#form-add-product")[0].reset();
        }

        function createProductRowHtml(product) {
            var amount = product["input_price"] * product["quantity"];
            var html = '<tr>';
            html += '<th scope="row"></th>';
            html += '<td>' + product["name"] + '</td>';
            html += '<td>' + product["input_unit"] + '</td>';
            html += '<td>' + product["sale_unit"] + '</td>';
            html += '<td>' + product["quantity"] + '</td>';
            html += '<td>' + product["input_price"] + '</td>';
            html += '<td>' + product["sale_price"] + '</td>';
            html += '<td><button class="btn btn-xs btn-danger btnRemoveProduct" data-amount="' + amount + '" data-name="' + product["name"] + '">Xóa</button></td>';
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

        $(document).on("click", "button.btnRemoveProduct", function (e) {
            totalAmount -= $(this).data("amount");
            var name = $(this).data("name");
            updateTotalAmount(totalAmount);
            products = products.filter(function(el) {
                return el["name"] !== name;
            });
            updateProductInput();
            $(this).closest('tr').remove();
        });
        
        $("#btnRemoveAll").click(function (e) {
            totalAmount = 0;
            products = [];
            updateProductInput(totalAmount);
            $("table#productTable tbody").html('<td colspan="8">Chưa có thuốc được thêm</td>');
        });

        function init_daterangepicker() {

            if (typeof ($.fn.daterangepicker) === 'undefined') {
                return;
            }
            console.log('init_daterangepicker');

            $('.date-picker').daterangepicker({
                singleDatePicker: true,
                singleClasses: "picker_1",
                autoUpdateInput: false,
//                autoApply: true,
                locale: {
                    format: 'DD-MM-YYYY'
                }
            });

            $('.date-picker').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY'));
            });
        }

        function updateTotalAmount(totalAmount) {
            $("label#lbTotalAmount").text(totalAmount);
        }

        function updateProductInput() {
            $("#txtProducts").val(JSON.stringify(products));
        }

        init_daterangepicker();
    </script>
@endsection
