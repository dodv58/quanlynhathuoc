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
            <form action="" method="post">
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
                                <h2 class="pull-right" style="color:red">3000</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="form-group">
                                    <label for="middle-name" class="control-label">Tiền phải trả</label>
                                    <label for="middle-name" class="control-label pull-right"
                                           style="padding-right: 15px">3000</label>
                                    <input id="txtTotalAmount" name="totalAmount" type="hidden" value="100">
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
                                           style="padding-right: 15px">6000</label>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success col-md-2 pull-right" type="submit">
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
    <script>
        var products = [];

        function createProductRowHtml(product) {
            var html = '<tr>';
            html += '<th scope="row"><input class="form-control" type="hidden" name="shipments[' + product["id"] + '][id]" value="' + product["id"] + '"></th>';
            html += '<td>' + product["name"] + '</td>';
            html += '<td>' + product["expire_date"] + '</td>';
            html += '<td><input class="form-control quantity-input text-right" type="text" name="shipments[' + product["id"] + '][quantity]" value="0"></td>';
            html += '<td>' + product["sale_price"] + '<input class="form-control" type="hidden" name="shipments[' + product["id"] + '][sale_price]" value="' + product["sale_price"] + '"></td>';
            html += '<td>0</td>';
            html += '<td>Xóa</td>';
            html += '</tr>';

            return html;
        }

        $('#txtSearchString').autocomplete({
            serviceUrl: '/product/find-products',
            paramName: 'searchString',
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
    </script>
@endsection
