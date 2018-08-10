@extends('layouts.app.app',['page_header' => 'Modify Outputs'])

@section('main-content')
    <div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <div class="col-md-offset-1">
                            <h1><b>{{ $download->publication->publication_name.' | '.$download->publication_date }}</b></h1>
                        </div>
                        <div class="row">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-1">
                                        <h3><a href="{{ $download->publication->website }}">{{ $download->publication->website }}</a></h3>
                                        <h3>Username: {{ $download->publication->username }}</h3>
                                        <h3>Password: {{ $download->publication->password }}</h3>
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::model($output,['method'=>'PATCH','url' => '/agent/outputs/'.$download->id,'class'=>'form-horizontal']) !!}
                                        {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group">
                                                        {!! Form::label('sale_records', 'Sale ',['class'=>'col-md-4 control-label']) !!}
                                                    <div class="col-md-3">
                                                        {!! Form::text('sale_records',null,['class'=>'form-control control-label','required']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    {!! Form::label('rent_records', 'Rent :',['class'=>'col-md-4 control-label']) !!}
                                                    <div class="col-md-3">
                                                        {!! Form::text('rent_records',null,['class'=>'form-control control-label','required'=>'true']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    {!! Form::label('total_records', 'Total',['class'=>'col-md-4 control-label']) !!}
                                                    <div class="col-md-3">
                                                        {!! Form::text('total_records',null,['class'=>'form-control control-label','readonly'=>'true']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    {!! Form::label('sequence_from', 'Sequence From',['class'=>'col-md-4 control-label']) !!}
                                                    <div class="col-md-3">
                                                        {!! Form::text('sequence_from',null,['class'=>'form-control','required'=>'true']) !!}
                                                    </div>
                                                    {!! Form::label('sequence_to', 'To',['class'=>'col-md-2 control-label']) !!}
                                                    <div class="col-md-3">
                                                        {!! Form::text('sequence_to',null,['class'=>'form-control','required'=>'true']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    {!! Form::label('output_date', 'Output Date',['class'=>'col-md-4 control-label']) !!}
                                                    <div class="col-md-3">
                                                        {!! Form::date('output_date',\Carbon\Carbon::now()->toDateString(),['class'=>'form-control']) !!}
                                                    </div>
                                                    {!! Form::label('status', 'Status',['class'=>'col-md-2 control-label']) !!}
                                                    <div class="col-md-3">
                                                        {!! Form::select('status',$status_lists,null,['class'=>'form-control','required'=>'true']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    {!! Form::label('delivery_time', 'Delivery Time',['class'=>'col-md-4 control-label']) !!}
                                                    <div class="col-md-3">
                                                        {!! Form::text('delivery_time',null,['class'=>'form-control']) !!}
                                                    </div>
                                                    {!! Form::label('remarks', 'Remarks',['class'=>'col-md-2 control-label']) !!}
                                                    <div class="col-md-3">
                                                        {!! Form::text('remarks',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-11 col-md-offset-1">
                                                    <button type="submit" class="btn btn-danger form-control"><i class="fa fa-plus"></i>Closed</button>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="box box-solid box-info">

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Sale Type</th>
                        <th>Operator</th>
                        <th>Batch ID</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Total Hours</th>
                        <th>Records</th>
                        <th>Entry Date</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($download->log_sheet as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->sale_rent }}</td>
                            <td>{{ $log->operators }}</td>
                            <td>{{ $log->batch_id }}</td>
                            <td>{{ $log->start_time }}</td>
                            <td>{{ $log->end_time }}</td>
                            <td>{{ $log->total_time }}</td>
                            <td>{{ $log->records }}</td>
                            <td>{{ $log->entry_date }}</td>
                            <td>{{ $log->status}}</td>
                            <td>{{ $log->remarks }}</td>
                            <td>[Modify]</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection

@push('scripts')
   <script>
       $( document ).ready(function() {

           $("#sale_records").focus().select();

           $( "#sale_records" ).keyup(function() {
               var $total_records = parseInt($('#sale_records').val()) + parseInt($('#rent_records').val());
               $('#total_records').val($total_records);
           });

           $( "#rent_records" ).keyup(function() {
               var $total_records = parseInt($('#sale_records').val()) + parseInt($('#rent_records').val());
               $('#total_records').val($total_records);
           });
       });
   </script>
@endpush
