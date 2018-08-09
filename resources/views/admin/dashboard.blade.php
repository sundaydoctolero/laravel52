@extends('layouts.admin.admin',['page_header' => 'Dashboard','logo'=> 'fa fa-home'])

@section('main-content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Not Updated, Pending, For Query</span>
                    <span class="info-box-number">{{ $not_updated }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">For Download</span>
                    <span class="info-box-number">{{ $for_download }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">For Entry</span>
                    <span class="info-box-number">{{ $for_entry }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Delivered Today</span>
                    <span class="info-box-number">{{ $delivered_today }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Ongoing Entry</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody><tr>
                            <th>Operator No.</th>
                            <th>Name</th>
                            <th>Publication Name</th>
                            <th>Publication Date</th>
                            <th>Batch ID</th>
                            <th>Start Time</th>
                        </tr>
                            @foreach($ongoings as $ongoing)
                                <tr>
                                <td>{{ $ongoing->user->operator_no }}</td>
                                <td>{{ $ongoing->user->name }}</td>
                                <td>{{ $ongoing->download->publication->publication_name }}</td>
                                <td>{{ $ongoing->download->publication_date }}</td>
                                <td>{{ $ongoing->batch_id }}</td>
                                <td>{{ $ongoing->start_time }}</td>
                                </tr>
                            @endforeach
                        </tbody></table>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Daily Production</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="line-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                        <svg height="300" version="1.1" width="786.5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;">
                            <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                            <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                            <text x="49.515625" y="261" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                            </text>
                            <path fill="none" stroke="#aaaaaa" d="M62.015625,261H761.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="49.515625" y="202" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">1,000</tspan>
                            </text>
                            <path fill="none" stroke="#aaaaaa" d="M62.015625,202H761.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="49.515625" y="143" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2,000</tspan>
                            </text>
                            <path fill="none" stroke="#aaaaaa" d="M62.015625,143H761.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="49.515625" y="84" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">3,000</tspan>
                            </text>
                            <path fill="none" stroke="#aaaaaa" d="M62.015625,84H761.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="49.515625" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">4,000</tspan>
                            </text>


                            <path fill="none" stroke="#aaaaaa" d="M62.015625,25H761.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <text x="633.1620405528554" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2018-08-02</tspan>
                            </text>
                            <text x="322.0912249392467" y="273.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2018-08-01</tspan>
                            </text>


                            <path fill="none" stroke="#3c8dbc" d="M62.015625,229.5412C81.56379100850546,229.2108,120.66012302551641,231.53245,140.20828903402187,228.2196C159.75645504252734,224.90675000000002,198.8527870595383,204.50514644808743,218.40095306804375,203.0384C237.7366390112394,201.58759644808742,276.4080108976306,219.34895,295.74369684082626,216.5494C315.0793827840219,213.74984999999998,353.75075467041313,183.43358661202186,373.0864406136088,180.642C392.63460662211423,177.81973661202184,431.73093863912516,191.15875,451.2791046476306,194.094C470.8272706561361,197.02925,509.92360267314706,218.06921420765028,529.4717686816525,204.124C548.8074546248481,190.33036420765026,587.4788265112394,91.84023618784529,606.814512454435,83.1386C625.9377183323207,74.5325861878453,664.1841300880924,125.20556758241756,683.3073359659782,134.89339999999999C702.8555019744836,144.79651758241758,741.9518339914946,154.85015,761.5,161.50240000000002" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                            <circle cx="62.015625" cy="229.5412" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            <circle cx="140.20828903402187" cy="228.2196" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            <circle cx="218.40095306804375" cy="203.0384" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            <circle cx="295.74369684082626" cy="216.5494" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            <circle cx="373.0864406136088" cy="180.642" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            <circle cx="451.2791046476306" cy="194.094" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            <circle cx="529.4717686816525" cy="204.124" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            <circle cx="606.814512454435" cy="83.1386" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            <circle cx="683.3073359659782" cy="134.89339999999999" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            <circle cx="761.5" cy="161.50240000000002" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        </svg>
                        <div class="morris-hover morris-default-style" style="left: 18.9922px; top: 162px; display: none;">
                            <div class="morris-hover-row-label">2011 Q1</div>
                            <div class="morris-hover-point" style="color: #3c8dbc">
                                Item 1:
                                2,666
                    </div>
                    </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>




@endsection