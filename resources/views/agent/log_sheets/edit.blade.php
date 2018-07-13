@extends('layouts.app.app',['page_header' => 'Modify Log-Sheet'])

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

        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                <tr>
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
                <tfoot>
                    <tr>
                        {!! Form::model($download,['method'=>'PATCH','url' => '/agent/entries/'.$download->id]) !!}
                            {{ csrf_field() }}
                        <td width="100px">
                            {!! Form::select('sale_rent',['Sale'=>'Sale','Rent'=>'Rent'],null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::text('operators',null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::text('batch_id',null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::time('start_time',null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::time('end_time',null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::time('total_time',null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::text('records',null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::text('entry_date',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control input-sm','readonly'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::select('status',['Finished'=>'FIN','Unfinished'=>'UNF'],null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </td>
                        <td>
                            {!! Form::text('remarks',null,['class'=>'form-control input-sm']) !!}
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-block btn-flat input-sm"><i class="fa fa-plus"></i>Add</button>

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