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
                    <h3>Tạo hóa đơn</h3>
                </div>
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
            <form action="" method="post" id="submitForm">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Hóa đơn </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table" id="billTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên thuốc</th>
                                        <th>HSD</th>
                                        <th>Số lượng bán</th>
                                        <th>Giá bán</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="7">Chưa có thuốc được thêm</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Tổng tiền </h2>
                                <h2 class="pull-right" id="lbTotalAmount" style="color:red">0</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="form-group">
                                    <label for="middle-name" class="control-label">Tiền phải trả</label>
                                    <label for="middle-name" class="control-label pull-right" id="lbTotalAmount2"
                                           style="padding-right: 15px">0</label>
                                    <input id="txtTotalAmount" name="totalAmount" type="hidden" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="txtReceivedAmount" class="control-label">Khách đưa</label>
                                    <div class="pull-right">
                                        <input id="txtReceivedAmount" class="form-control col-md-3"
                                               type="text" name="receivedAmount"
                                               style="text-align:right" value="0">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="form-group">
                                    <label for="middle-name" class="control-label">Tiền thừa</label>
                                    <label for="middle-name" class="control-label pull-right"
                                           id="lbBackAmount"
                                           style="padding-right: 15px">0</label>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success col-md-2 pull-right" type="button"
                                            id="btnSubmitBill">
                                        Thanh toán
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('jsLib')
    {{-- add js here--}}
    <script src="{{ asset('vendors/jquery-autocomplete/jquery.autocomplete.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    <script>
        var products = [];
        var totalAmount = 0;

        var billValidator = $("#submitForm").validate({
            rules: {
                receivedAmount: {
                    required: true,
                    digits: true
                }
            }
        });

        function createProductRowHtml(product) {
            var html = '<tr>';
            html += '<th scope="row"><input class="form-control" type="hidden" name="shipments[' + product["id"] + '][id]" value="' + product["id"] + '"></th>';
            html += '<td>' + product["name"] + '</td>';
            html += '<td>' + product["expire_date"] + '</td>';
            html += '<td><input class="form-control quantityInput text-right" type="number" max="' + product["quantity"] + '" name="shipments[' + product["id"] + '][quantity]" value="0"></td>';
            html += '<td>' + product["sale_price"] + '<input class="form-control productPrice" type="hidden" name="shipments[' + product["id"] + '][sale_price]" value="' + product["sale_price"] + '"></td>';
            html += '<td class="productAmount">0</td>';
            html += '<td><button class="btn btn-xs btn-danger btnRemoveProduct" data-name="' + product["name"] + '">Xóa</button></td>';
            html += '</tr>';

            return html;
        }

        $('#txtSearchString').autocomplete({
            serviceUrl: '/product/find-products',
            paramName: 'searchString',
            groupBy: 'name',
            transformResult: function (response) {
                response = JSON.parse(response);
                return {
                    suggestions: $.map(response, function (dataItem) {
                        var value = dataItem.name + ' - HSD: ' + dataItem.expire_date
                        return {value: value, data: dataItem};
                    })
                };
            },
            onSelect: function (suggestion) {
                //suggestion.object contain all values pass thru, no need to call again
                $("#txtSearchString").val("");
                if (products.length === 0) {
                    $("table#billTable tbody").html("");
                }
                $("table#billTable tbody").append(createProductRowHtml(suggestion.data));
                products.push(suggestion);
            }
        });

        $(document).on("change", "input.quantityInput", function (e) {
            var quantity = $(this).val();
            var salePrice = $(this).closest("tr").find("input.productPrice").val();
            $(this).closest("tr").find("td.productAmount").html(quantity * salePrice);
            updateTotalAmount();
        });

        $(document).on("keypress", "form#submitForm input", function (e) {
            return e.which !== 13 && e.keyCode !== 13;
        });

        $("#txtReceivedAmount").change(function () {
            $("#lbBackAmount").html(totalAmount - parseInt($(this).val()));
        });

        $(document).on("click", "button.btnRemoveProduct", function (e) {
            $(this).closest('tr').remove();
            var name = $(this).data("name");
            products = products.filter(function (el) {
                return el.data.name !== name;
            });
            updateTotalAmount();
        });

        $("#btnSubmitBill").click(function (e) {
            if (products.length === 0) {
                swal({
                    title: "Lỗi",
                    text: "Bạn chưa lựa chọn sản phẩm nào",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: "Lựa chọn",
                    closeOnConfirm: false
                });
                e.preventDefault();
                return;
            }
            if(!$('#submitForm').valid()){
                e.preventDefault();
                return;
            }
            swal({
                    title: "Xác nhận",
                    text: "Bạn hãy kiểm tra kĩ lại thông tin hóa đơn",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Hủy bỏ",
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Tạo hóa đơn",
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $("#submitForm").submit();
                    }
                });
        })

        function updateTotalAmount() {
            totalAmount = 0;
            $("td.productAmount").each(function () {
                totalAmount += parseInt($(this).html());
            });
            $("#lbTotalAmount").html(totalAmount);
            $("#lbTotalAmount2").html(totalAmount);
            $("#lbBackAmount").html(totalAmount - parseInt($("#txtReceivedAmount").val()));
        }
    </script>
@endsection
