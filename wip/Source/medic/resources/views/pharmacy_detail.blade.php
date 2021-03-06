
{{--/**--}}
 {{--* Created by PhpStorm.--}}
 {{--* User: dodv2--}}
 {{--* Date: 4/18/2017--}}
 {{--* Time: 2:40 PM--}}
 {{--*/--}}

@extends('layouts.app')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3 class="text-uppercase">CHI NHÁNH {{ $agency->name }} </h3>
                </div>
                <div class="title_right pull-right">
                    <h3><small>Địa chỉ {{ $agency->address }} - SĐT: {{ $agency->phone }}</small> </h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="dashboard_graph">
                        <div class="row x_title">
                            <h2>Doanh thu </h2>
                            <div class="col-md-6 pull-right">
                                <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                    <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content1">
                            <div id="graph_bar_group" style="width:100%; height:280px;">
                                <svg height="280" version="1.1" width="407" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.400024px; top: -0.800003px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël @@VERSION</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="41.296875" y="204.56356362656248" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M53.796875,204.56356362656248H382" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="41.296875" y="159.67267271992188" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.391422719921877" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">1,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M53.796875,159.67267271992188H382" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="41.296875" y="114.78178181328124" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.391156813281242" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M53.796875,114.78178181328124H382" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="41.296875" y="69.89089090664064" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.390890906640635" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">3,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M53.796875,69.89089090664064H382" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="41.296875" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4.390625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">4,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M53.796875,25H382" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="365.58984375" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-19.9895,454.1586)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-09-10</tspan></text><text x="332.76953125" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-36.4035,425.7286)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-09-15</tspan></text><text x="299.94921875" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-52.8098,397.3121)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-09-16</tspan></text><text x="267.12890625" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-69.2238,368.8821)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-09-17</tspan></text><text x="234.30859375" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-85.6301,340.4657)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-09-18</tspan></text><text x="201.48828125" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-102.0441,312.0357)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-09-19</tspan></text><text x="168.66796875" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-118.4504,283.6192)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-09-20</tspan></text><text x="135.84765625" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-134.8645,255.1892)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-09-29</tspan></text><text x="103.02734375" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-151.2707,226.7728)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-09-30</tspan></text><text x="70.20703125" y="217.06356362656248" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(0.5,-0.866,0.866,0.5,-167.6848,198.3428)"><tspan dy="4.391688626562484" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016-10-01</tspan></text><rect x="57.8994140625" y="168.3366146649035" width="10.8076171875" height="36.22694896165899" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="71.70703125" y="174.93557562817966" width="10.8076171875" height="29.62798799838282" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="90.7197265625" y="148.40505910235507" width="10.8076171875" height="56.158504524207416" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="104.52734375" y="171.83810415562147" width="10.8076171875" height="32.72545947094102" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="123.5400390625" y="125.15157761271523" width="10.8076171875" height="79.41198601384725" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="137.34765625" y="158.86463668360233" width="10.8076171875" height="45.698926942960156" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="156.3603515625" y="103.73862265024765" width="10.8076171875" height="100.82494097631483" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="170.16796875" y="138.97797201196056" width="10.8076171875" height="65.58559161460192" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="189.1806640625" y="85.28846648761836" width="10.8076171875" height="119.27509713894412" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="202.98828125" y="116.26318121320038" width="10.8076171875" height="88.3003824133621" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="222.0009765625" y="63.24703905245781" width="10.8076171875" height="141.31652457410468" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="235.80859375" y="86.63519321481758" width="10.8076171875" height="117.92837041174491" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="254.8212890625" y="48.747281289612886" width="10.8076171875" height="155.8162823369496" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="268.62890625" y="36.671631635726555" width="10.8076171875" height="167.89193199083593" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="287.6416015625" y="75.68181583359726" width="10.8076171875" height="128.88174779296523" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="301.44921875" y="105.08534937744687" width="10.8076171875" height="99.47821424911561" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="320.4619140625" y="96.78053455971836" width="10.8076171875" height="107.78302906684412" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="334.26953125" y="130.22424828516563" width="10.8076171875" height="74.33931534139685" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="353.2822265625" y="109.61932935901757" width="10.8076171875" height="94.94423426754491" rx="0" ry="0" fill="#26b99a" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect><rect x="367.08984375" y="158.68507311997575" width="10.8076171875" height="45.87849050658673" rx="0" ry="0" fill="#34495e" stroke="none" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></rect></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Nhân viên chi nhánh {{ $agency->name }}</h2>
                            <div class="nav navbar-right">
                                <a href="/home/agency/{{ $agency->id }}/addemployee"><button type="button" class="btn btn-dark"> Thêm nhân viên</button></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ tên</th>
                                    <th>Tài khoản</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $index => $employee)
                                    <tr>
                                        <th scope="row">{{ $index + 1}}</th>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->account }}</td>
                                        <th>{{ $employee->phone }}</th>
                                        <th>{{ $employee->email }}</th>
                                        <th>{{ $employee->role }}</th>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>


@endsection