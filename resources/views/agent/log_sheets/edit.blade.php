@extends('layouts.app.app',['page_header' => 'Modify Log-Sheet'])

@section('css')
    <style>
        .table-hover>tfoot>tr>td{
            padding:0;
        }
    </style>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid box-info">
                <div class="box-header">
                    <div class="col-md-offset-1">
                        <h1><b>{{ $download->publication->publication_name.' | '.$download->publication_date }}</b></h1>
                    </div>
                </div>
                <div class="box-body col-md-offset-1">
                    <h3><a href="{{ $download->publication->website }}">{{ $download->publication->website }}</a></h3>
                    <h3>Username: {{ $download->publication->username }}</h3>
                    <h3>Password: {{ $download->publication->password }}</h3>
                </div>
                <div class="box-footer">
                    <div class="col-md-12">
                    {!! Form::model($download,['method'=>'PATCH','url' => '/agent/entries/'.$download->id.'/closed_pub','class'=>'form-horizontal']) !!}
                        {{ Form::button('<i class="fa fa-rotate-left"></i> Closed Entry', ['type' => 'submit', 'class' => 'form-control btn btn-danger'] )  }}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-solid box-info">
        <div class="box-body table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Entry Date</th>
                    <th>S / R</th>
                    <th>Operator</th>
                    <th>Batch ID</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Total Hours</th>
                    <th>Records</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($download->log_sheet as $log)
                        <tr class="{{ $log->status == 'Finished' ? 'success' : '' }}">
                            <td>{{ $log->entry_date }}</td>
                            <td>{{ $log->sale_rent }}</td>
                            <td>{{ $log->user_id }}</td>
                            <td>{{ $log->batch_id }}</td>
                            <td>{{ $log->start_time }}</td>
                            <td>{{ $log->end_time }}</td>
                            <td>{{ $log->total_time }}</td>
                            <td align="right" width="40px">{{ $log->records }}</td>
                            <td><small class="label label-{{ $log->status == 'Finished' ? 'success' : 'danger' }}">{{ $log->status}}</small></td>
                            <td>{{ $log->remarks }}</td>
                            <td>
                                @if($log->user_id == auth()->user()->id)
                                    @if($log->end_time == '00:00:00')
                                        {!! Form::model($download,['method'=>'PATCH','url' => '/agent/entries/'.$log->id,'class'=>'form-inline']) !!}
                                        {!! Form::submit('Stop',['class'=>'btn btn-danger input-sm']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        {!! Form::model($download,['method'=>'PUT','url' => '/agent/entries/'.$download->id,'class'=>'form-horizontal']) !!}
                            {{ csrf_field() }}
                        <td>
                            {!! Form::hidden('entry_date',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control input-sm','readonly'=>'true']) !!}
                        </td>
                        <td colspan="2">
                            {!! Form::select('sale_rent',['Sale'=>'Sale','Rent'=>'Rent'],null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::text('batch_id',null,['class'=>'form-control input-sm','required'=>'true','pattern' => "[a-zA-Z0-9]{3}[_][0-9]{8}[_][sS|Rr][_][0-9]{2}"]) !!}
                        </td>
                        <td>
                            {!! Form::text('remarks',null,['class'=>'form-control input-sm','placeholder'=>'Remarks']) !!}
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-block btn-flat input-sm"><i class="fa fa-plus"></i>Start</button>
                        </td>
                        {!! Form::close() !!}
                    </tr>
                </tfoot>
            </table>
    </div>
@endsection

@push('scripts')
        <script>

        </script>
@endpush