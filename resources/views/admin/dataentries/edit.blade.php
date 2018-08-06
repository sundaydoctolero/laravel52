@extends('layouts.admin.admin',['page_header' => 'Modify Entries'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <div class="col-md-offset-1">
                        <h1><b>{{ $download->publication->publication_name.' | '.$download->publication_date.' | '
                                    .$download->publication->publication_code }}</b></h1>
                    </div>
                </div>

                <div class="box-body">
                    {!! Form::model($download,['method'=>'PATCH','url' => '/dataentries/'.$download->id]) !!}
                        @include('admin.dataentries.form',['buttonlabel'=>'Update Entries'])
                    {!! Form::close() !!}
                </div>

                <div class="box box-solid box-info">
                    <div class="box-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Entry Date</th>
                                <th>S / R</th>
                                <th class="text-center">Operator</th>
                                <th class="text-center">Batch ID</th>
                                <th class="text-center">Start</th>
                                <th class="text-center">End</th>
                                <th class="text-center">Total Hours</th>
                                <th width="80px">Records</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($download->log_sheet as $log)
                                {!! Form::model($log,['method'=>'PATCH','url' => '/data_entries/'.$log->id.'/edit_log_sheet']) !!}
                                    {{ csrf_field() }}
                                <tr class="{{ $log->status == 'Finished' ? 'success' : '' }}">
                                        <td align="left">{{ $log->entry_date }}</td>
                                        <td>{{ Form::select('sale_rent',['Sale'=>'Sale','Rent'=>'Rent'],null,['class'=>'form-control input-sm']) }}</td>
                                        <td class="text-center"><span class="badge bg-green">{{ $log->user->operator_no }}</span></td>
                                        <td align="left"><strong>{{ Form::text('batch_id',null,['class'=>'form-control input-sm']) }}</strong></td>
                                        <td class="text-center"><input type="time" name="start_time" class="form-control" value="{{ $log->start_time }}" /></td>
                                        <td class="text-center"><input type="time" name="end_time" class="form-control" value="{{ $log->end_time }}" /></td>
                                        <td class="text-center">{{ $log->total_time }}</td>
                                        <td class="text-right">{{ Form::number('records', null,['class'=>'form-control']) }}</td>
                                        <td align="left">{{ Form::select('status',['Finished'=>'FIN','Unfinished'=>'UNF'],null,['class'=>'form-control input-sm','required'=>'true']) }}</td>
                                        <td>{!! Form::text('remarks',null,['class'=>'form-control input-sm','placeholder'=>'Remarks']) !!}</td>
                                        <td class="text-center">{!! Form::submit('Update',['class'=>'form-control btn btn-success input-sm']) !!}</td>
                                    </tr>
                                {!! Form::close() !!}
                            @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>

@endsection
