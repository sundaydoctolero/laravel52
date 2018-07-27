@extends('layouts.app.app',['page_header' => 'Modify Log-Sheet'])

@section('css')
    <style>
    </style>
@endsection

@section('main-content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <div class="col-md-offset-1">
                        <h1>
                            <strong>{{ $download->publication->publication_name}}</strong>
                            <small class="label label-info"> {{$download->publication->publication_code }}{{ ' '.$download->publication_date }}</small>
                        </h1>
                    </div>
                </div>
                <div class="box-body" style="font-size: 16px">
                    <div class="col-md-5 col-md-offset-1">
                        <ul class="list-group">
                            <li class="list-group-item"><a target="_blank" href="{{ $download->publication->website }}">{{ $download->publication->website }}</a></li>
                            <li class="list-group-item"><i>state : </i>
                                @foreach($download->publication->states as $state)
                                    <small class="label label-info">{{ $state->state_code }}</small>
                                @endforeach
                            </li>
                            <li class="list-group-item"><i>username : </i>{{ $download->publication->username }}</li>
                            <li class="list-group-item"><i>password : </i>{{ $download->publication->password }}</li>
                            <li class="list-group-item"><i>issue : </i>
                                {{ $download->publication->issue.' [ ' }}
                                @foreach($download->publication->days as $day)
                                    {{ $day->day_code.' | '}}
                                @endforeach
                                ]
                            </li>
                            <li class="list-group-item"><i>download instruction :</i> </li>
                        </ul>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="col-md-6">
                        {!! Form::model($download,['method'=>'PATCH','url' => '/agent/entries/'.$download->id.'/back','class'=>'form-horizontal']) !!}
                        {{ Form::button('<i class="fa fa-rotate-left"></i> Back To For Entry', ['type' => 'submit', 'class' => 'form-control btn btn-warning'] )  }}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6">
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
                    <th align="center">Operator</th>
                    <th align="center">State</th>
                    <th align="center">Batch ID</th>
                    <th align="center">Start</th>
                    <th align="center">End</th>
                    <th align="center">Total Hours</th>
                    <th width="80px">Records</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($log_sheets as $log)
                        <tr class="{{ $log->status == 'Finished' ? 'success' : '' }}">
                            <td align="center">{{ $log->entry_date }}</td>
                            <td align="center">{{ $log->sale_rent }}</td>
                            <td align="center"><span class="badge bg-blue">{{ $log->user_id }}</span></td>
                            <td align="center">{{ $log->state }}td>
                            <td align="center">{{ $log->batch_id }}</td>
                            <td align="center">{{ $log->start_time }}</td>
                            <td align="center">{{ $log->end_time }}</td>
                            <td align="center">{{ $log->total_time }}</td>
                            <td align="center">{{ $log->records }}</td>
                            <td align="center"><small class="label label-{{ $log->status == 'Ongoing' ? 'warning' : ($log->status == 'Finished' ? 'success' : 'danger') }}">{{ $log->status }}</small></td>
                            <td align="center">{{ $log->remarks }}</td>
                            <td></td>
                        </tr>
                    @endforeach

                    @foreach($download->log_sheet as $log)
                        <tr class="{{ $log->status == 'Finished' ? 'success' : '' }}">
                            <td align="center">{{ $log->entry_date }}</td>
                            <td align="center">{{ $log->sale_rent }}</td>
                            <td align="center"><span class="badge bg-green">{{ $log->user_id }}</span></td>
                            <td align="center">{{ $log->state }}</td>
                            <td align="center"><strong>{{ $log->batch_id }}</strong></td>
                            <td align="center">{{ $log->start_time }}</td>
                            <td align="center">{{ $log->end_time }}</td>
                            <td align="center">{{ $log->total_time }}</td>
                            {!! Form::model($download,['method'=>'PATCH','url' => '/agent/entries/'.$log->id,'class'=>'form-inline']) !!}
                                <td align="right">
                                    @if($log->end_time != '00:00:00')
                                        {{ $log->records }}
                                    @else
                                        {!! Form::text('records',$log->records == 0 ? '' : $log->records,['class'=>'form-control input-sm','required'=>'true']) !!}
                                    @endif
                                </td>
                                <td align="center">
                                    @if($log->end_time != '00:00:00')
                                        <small class="label label-{{ $log->status == 'Finished' ? 'success' : 'danger' }}">{{ $log->status }}</small>
                                    @else
                                        {!! Form::select('status',['Finished'=>'FIN','Unfinished'=>'UNF'],null,['class'=>'form-control input-sm','required'=>'true']) !!}
                                    @endif
                                </td>
                                <td>
                                    @if($log->end_time != '00:00:00')
                                        <small class="label label-info">{{ $log->remarks }}</small>
                                    @else
                                        {!! Form::text('remarks',$log->remarks,['class'=>'form-control input-sm','placeholder'=>'Remarks']) !!}
                                    @endif

                                </td>


                                <td align="center">
                                    @if($log->user_id == auth()->user()->id)
                                        @if($log->end_time == '00:00:00')
                                            {!! Form::submit('Stop',['class'=>'btn btn-danger input-sm']) !!}
                                        @endif
                                    @endif
                                </td>
                            {!! Form::close() !!}
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        @if($download->log_sheet->count() == 0)
                            <td colspan="11">
                                {!! Form::model($download,['method'=>'PUT','url' => '/agent/entries/'.$download->id,'class'=>'form-inline']) !!}
                                {{ csrf_field() }}
                                {!! Form::hidden('entry_date',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control input-sm','readonly'=>'true']) !!}
                                {!! Form::select('state',$download->publication->states->lists('state_code','state_code'),null,['class'=>'form-control input-sm','required'=>'true']) !!}
                                {!! Form::select('sale_rent',['Sale'=>'Sale','Rent'=>'Rent'],null,['class'=>'form-control input-sm','required'=>'true']) !!}
                                {!! Form::text('batch_id',null,['class'=>'form-control input-sm','required'=>'true','pattern' => "[0-9]{2}"]) !!}
                                {!! Form::text('remarks',null,['class'=>'form-control input-sm','placeholder'=>'Remarks']) !!}
                                {!! Form::submit('Start Entry',['class'=>'btn btn-success input-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        @else
                            @if($log->end_time != '00:00:00')
                            <td colspan="11">
                                <div class="form-group pull-right">
                                    {!! Form::model($download,['method'=>'PUT','url' => '/agent/entries/'.$download->id,'class'=>'form-inline']) !!}
                                    {{ csrf_field() }}
                                    {!! Form::hidden('entry_date',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control','readonly'=>'true']) !!}
                                    {!! Form::select('state',$download->publication->states->lists('state_code','state_code'),null,['class'=>'form-control input-sm','required'=>'true']) !!}
                                    {!! Form::select('sale_rent',['Sale'=>'Sale','Rent'=>'Rent'],null,['class'=>'form-control','required'=>'true']) !!}
                                    {!! Form::text('batch_id',null,['class'=>'form-control','required'=>'true','pattern' => "[0-9]{2}"]) !!}
                                    {!! Form::text('remarks',null,['class'=>'form-control','placeholder'=>'Remarks']) !!}
                                    {!! Form::submit('Start Entry',['class'=>'btn btn-success']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            @endif
                        @endif
                    </tr>
                </tfoot>
            </table>
    </div>
@endsection

@push('scripts')
        <script>

        </script>
@endpush