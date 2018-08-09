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
                        <h1 class="box-title">

                        </h1>
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
                        <th>State</th>
                        <th>Publication Name</th>
                        <th class="text-center">Publication Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-right">Sale</th>
                        <th class="text-right">Rent</th>
                        <th class="text-center">Sequence From</th>
                        <th class="text-center">Sequence To</th>
                        <th class="text-center">Output Date</th>
                        <th>Folder</th>
                        <th>Remarks</th>
                    </tr>
                    @foreach($downloads as $count => $delivered)
                            @foreach($delivered->output as $row)
                                <tr>
                                    <td>{{ $count++ + 1 }}</td>
                                    <td>{{ $row->state }}</td>
                                    <td>{{ $delivered->publication->publication_name }}</td>
                                    <td class="text-center">{{ $delivered->publication_date }}</td>
                                    <td class="text-center">{{ $delivered->status }}</td>
                                    <td class="text-right">{{ $row->sale_records }}</td>
                                    <td class="text-right">{{ $row->rent_records }}</td>
                                    <td class="text-center">{{ $row->sequence_from }}</td>
                                    <td class="text-center">{{ $row->sequence_to }}</td>
                                    <td class="text-center">{{ $row->output_date }}</td>
                                    <td>{{ $row->delivery_time }}</td>
                                    <td>{{ $row->remarks }}</td>
                                </tr>
                            @endforeach
                    @endforeach
                    </tbody>
                    <tfoot>
                        @if($downloads->count() > 0)
                            <tr>
                                <td colspan="12">
                                    <a href="/export/generate_pub_details?date_from={{request('date_from')}}&delivery_time={{request('delivery_time')}}" class="btn-block btn btn-warning"><i class="fa fa-download"></i> Download Publication Details</a>
                                </td>
                            </tr>
                        @endif
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
