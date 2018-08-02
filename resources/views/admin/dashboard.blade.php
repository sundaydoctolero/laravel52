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
    </div>




@endsection