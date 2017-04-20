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
                            <div class="pull-right">
                                <button class="btn btn-sm btn-success"
                                        data-backdrop="static" data-keyboard="false"
                                        data-toggle="modal" data-target=".add-product-modal">
                                    <i class="fa fa-plus"></i> Thêm thuốc mới
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="drug-">Tên Thuốc
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="productName" name="productName" required="required"
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Mã vạch
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input id="middle-name" class="form-control col-md-12 col-xs-12" type="text"
                                                   name="serial">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                            Đơn vị nhập
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control" id="input-type">
                                                <option>Hộp</option>
                                                <option>Vỉ</option>
                                                <option>Viên</option>
                                                <option>Tuýp</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                            Đơn vị bán
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="form-control">
                                                <option>Hộp</option>
                                                <option>Vỉ</option>
                                                <option>Viên</option>
                                                <option>Tuýp</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="exchange-value">Quy
                                                                                                                      đổi<span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="exchangename-value" required="required"
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
                                            <input type="text" id="quantity" required="required"
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input-price">Giá
                                                                                                                   nhập<span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="input-price" required="required"
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Giá
                                                                                                             bán<span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="price" required="required"
                                                   class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Ngày sản xuất
                                        </label>
                                        <div class="col-md-6 xdisplay_inputx has-feedback ">
                                            <input type="text" class="form-control has-feedback-left date-picker"
                                                   id="manufacturedDate"
                                                   placeholder="First Name" aria-describedby="">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">
                                            Ngày hết hạn</label>
                                        <div class="col-md-6 xdisplay_inputx has-feedback">
                                            <input type="text" class="form-control has-feedback-left date-picker"
                                                   id="expireDate"
                                                   placeholder="First Name" aria-describedby="">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button">Hủy</button>
                                        <button type="submit" class="btn btn-success">Thêm thuốc</button>
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
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên thuốc</th>
                                    <th>Đơn vị nhập</th>
                                    <th>Đơn vị bán</th>
                                    <th>Số lượng nhập</th>
                                    <th>Giá nhập</th>
                                    <th>Giá bán</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="ln_solid"></div>
                            <div class="col-md-5 col-sm-12 col-xs-12 pull-right">
                                <form class="form-horizontal form-label-left">
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
                                        <div class="col-md-6 xdisplay_inputx form-group has-feedback pull-right">
                                            <input type="text" class="form-control has-feedback-left date-picker" id="">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success col-md-3 pull-right" type="button">Nhập Kho
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
    <div class="modals">
        <div class="modal fade add-product-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

                    <form action="{{url('/product/add-product')}}" method="post" class="form-horizontal">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Thêm thuốc mới</h4>
                        </div>
                        <div class="modal-body col-md-12">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="productNameModal" class="control-label col-md-2 col-xs-12">
                                    Tên thuốc
                                </label>
                                <div class="col-md-9 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Tên thuốc"
                                           id="productNameModal" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productPriceModal" class="control-label col-md-2 col-xs-12">
                                    Giá
                                </label>
                                <div class="col-md-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Giá dự kiến"
                                           id="productPriceModal" name="price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="categoryModal" class="control-label col-md-2 col-xs-12">
                                    Danh mục
                                </label>
                                <div class="col-md-6 col-xs-12">
                                    <select class="form-control" name="category_id" id="categoryModal">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>

                    </form>
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

       $('#productName').autocomplete({
            serviceUrl: '/product/suggest-products',
            paramName: 'searchString',
            transformResult: function (response) {
                response = JSON.parse(response);
                return {
                    suggestions: $.map(response, function (dataItem) {
                        return {value: dataItem.name, data: dataItem.id};
                    })
                };
            }
        });

        function init_daterangepicker() {

            if (typeof ($.fn.daterangepicker) === 'undefined') {
                return;
            }
            console.log('init_daterangepicker');

            $('.date-picker').daterangepicker({
                singleDatePicker: true,
                singleClasses: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        }

        init_daterangepicker();
    </script>
@endsection
