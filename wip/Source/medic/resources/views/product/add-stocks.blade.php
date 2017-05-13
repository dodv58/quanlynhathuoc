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
                <div class="title_right text-right">
                    <button class="btn btn-sm btn-success addNewPopup" style="margin: 8px 0;">
                        <i class="fa fa-plus"></i> Thêm sản phẩm mới
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel form-inline">
                        <div class="form-group" style="width: 100px">
                            <label for="txtSearchString" class="control-label pull-left">
                                Tìm kiếm
                            </label>
                        </div>
                        <div class="form-group" style="width: 80%">
                            <input id="txtSearchString" class="form-control"
                                   style="width: 100%"
                                   placeholder="Nhập tên thuốc"
                                   type="text" name="searchString">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thông tin lô nhập</h2>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="form-add-product" data-parsley-validate class="form-horizontal form-label-left"
                                  novalidate>
                                <div class="col-md-6 col-xs-12">
                                    <input type="hidden" id="txtProductId" name="product_id">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="drug-">Tên Thuốc
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="txtProductName" name="productName"
                                                   required readonly
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="productCode" class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Danh mục
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" name="categoryId" id="ddlCategoryId"
                                                    readonly="">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">Số lượng<span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="txtQuantity" required="required" name="quantity"
                                                   class="form-control col-md-7 col-xs-12">
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ddlSaleUnit">
                                            Đơn vị bán <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" id="ddlSaleUnit" name="saleUnit" readonly="">
                                                <option value="Hộp">Hộp</option>
                                                <option value="Vỉ">Vỉ</option>
                                                <option value="Viên">Viên</option>
                                                <option value="Tuýp">Tuýp</option>
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
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                                        <button class="btn btn-danger" type="reset" id="btnClear">Hủy</button>
                                        <button type="button" id="btnAddProduct" class="btn btn-success">Thêm thuốc vào
                                                                                                         lô
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
                            <h2>Danh sách thuốc trong lô </h2>
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
                                        <button class="btn btn-danger col-md-3 pull-right" type="button"
                                                id="btnRemoveAll">
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
    <!-- Modals -->
    <div id="addProductModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="addProductForm" method="post" action="{{url('product/add')}}" class="form-horizontal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">Thêm thông tin</h4>
                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="drug-">Tên
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" id="txtAddProductName" name="productName"
                                       required
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productCode" class="control-label col-md-3 col-sm-3 col-xs-12">
                                Danh mục
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="form-control" name="categoryId" id="ddlAddCategoryId">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="drug-">Đơn vị bán ra
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <select class="form-control" id="ddlAddSaleUnit" name="saleUnit">
                                    <option value="Hộp">Hộp</option>
                                    <option value="Vỉ">Vỉ</option>
                                    <option value="Viên">Viên</option>
                                    <option value="Tuýp">Tuýp</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="drug-">Giá bán ra
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" id="txtAddSalePrice" name="salePrice"
                                       required
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="drug-">Giới hạn số lượng
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text" id="txtAddMinQuantity" name="minQuantity"
                                       required
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary addNewProduct">Thêm thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('jsLib')
    {{-- add js here--}}
    <script src="{{ asset('vendors/jquery-autocomplete/jquery.autocomplete.js') }}"></script>
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

        var addProductModalValidation = $("#addProductForm").validate({
            rules: {
                minQuantity: {
                    required: true,
                    digits: true
                },
                salePrice: {
                    required: true,
                    digits: true
                },
                name: {
                    required: true
                }
            }
        });

        var products = [];
        var totalAmount = 0;
        $("#btnAddProduct").click(function (e) {
            if ($('#form-add-product').valid()) {
                var product = {};
                product["product_id"] = $("#txtProductId").val();
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

        $('#txtSearchString').autocomplete({
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
                if (suggestion.data.id !== null) {
                    $("#txtProductId").val(suggestion.data.id);
                    $("#txtProductName").val(suggestion.data.name);
                    $("#txtSalePrice").val(suggestion.data.price);
                    $("#ddlCategoryId").val(suggestion.data.category_id);
                    $("#ddlSaleUnit").val(suggestion.data.unit);
                    $("#txtSearchString").val("");
                } else {
                    swal({
                            title: "Chú ý",
                            text: "Sản phẩm bạn chọn chưa từng nhập kho, cần thêm thông tin!",
                            type: "warning",
                            showCancelButton: true,
                            cancelButtonText: "Hủy bỏ",
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Đồng ý",
                            closeOnConfirm: true
                        },
                        function (isConfirm) {
                            if (isConfirm) {
                                $("#txtAddProductName").val(suggestion.data.name);
                                $("#ddlAddCategoryId").val(suggestion.data.category_id)
                                $("#ddlAddSaleUnit").val(suggestion.data.unit);
                                $("#txtAddSalePrice").val(suggestion.data.price);
                                $("#txtAddMinQuantity").val();
                                $("#addProductModal").modal('show');
                            }
                        });
                }
            }
        });

        $(".addNewPopup").click(function (e) {
            $("#addProductModal").modal('show');
        });

        $(".addNewProduct").click(function (e) {
            if (addProductModalValidation.valid()) {
                $.ajax({
                    type: "POST",
                    url: '{{url('product/add')}}',
                    data: $("#addProductForm").serialize(), // serializes the form's elements.
                    success: function (data) {
                        $("#addProductModal").modal('hide');
                        $("#txtProductId").val(data.id);
                        $("#txtProductName").val(data.name);
                        $("#txtSalePrice").val(data.price);
                        $("#ddlCategoryId").val(data.category_id);
                        $("#ddlSaleUnit").val(data.unit);
                        $("#txtSearchString").val("");
                    }
                });
            }
        });

        $('#addProductModal').on('hidden.bs.modal', function () {
            addProductModalValidation.resetForm();
            $("#addProductForm").find('.error').removeClass('error');
        });

        $(document).on("click", "button.btnRemoveProduct", function (e) {
            totalAmount -= $(this).data("amount");
            var name = $(this).data("name");
            updateTotalAmount(totalAmount);
            products = products.filter(function (el) {
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
