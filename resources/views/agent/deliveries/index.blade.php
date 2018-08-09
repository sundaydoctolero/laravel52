@extends('layouts.app.app',['page_header' => 'Outputs'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {!! Form::open(['url' => '/agent/deliveries','class' => 'form-inline', 'method' => 'GET']) !!}
                <div class="form-group">
                    <h3 class="box-title"><i class="fa fa-arrow-up"></i><b> Deliveries</b> </h3>
                </div>
                <div class="pull-right">
                    <div class="form-group">
                        {!! Form::label('date_from', 'Date :') !!}
                        {!! Form::date('date_from',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('delivery_time', 'Folder :') !!}
                        {!! Form::select('delivery_time', $delivery_time,null,['class'=>'form-control','placeholder'=>'--']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Filter Delivery',['class'=>'btn btn-primary']) !!}
                    </div>
                    <div class="form-group">
                        <h1 class="box-title"><a href="/export/generate_pub_details" class="btn btn-warning"><i class="fa fa-download"></i> Download Publication Details</a></h1>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <th>Publication Name</th>
                        <th>Publication Date</th>
                        <th>Status</th>
                        <th>Sale</th>
                        <th>Rent</th>
                        <th>Sequence From</th>
                        <th>Sequence To</th>
                        <th>Output Date</th>
                        <th>Folder</th>
                        <th>Remarks</th>
                    </tr>
                    @foreach($downloads as $count => $delivered)
                            @foreach($delivered->output as $row)
                                <tr>
                                    <td>{{ $count++ + 1 }}</td>
                                    <td>{{ $delivered->publication->publication_name }}</td>
                                    <td>{{ $delivered->publication_date }}</td>
                                    <td>{{ $delivered->status }}</td>
                                    <td>{{ $row->sale_records }}</td>
                                    <td>{{ $row->rent_records }}</td>
                                    <td>{{ $row->sequence_from }}</td>
                                    <td>{{ $row->sequence_to }}</td>
                                    <td>{{ $row->output_date }}</td>
                                    <td>{{ $row->delivery_time }}</td>
                                    <td>{{ $row->remarks }}</td>
                                </tr>
                            @endforeach

                    @endforeach
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
