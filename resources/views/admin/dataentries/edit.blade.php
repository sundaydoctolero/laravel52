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
                                <th align="center">Operator</th>
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
                            @foreach($download->log_sheet as $log)
                                <tr class="{{ $log->status == 'Finished' ? 'success' : '' }}">
                                    <td align="left">{{ $log->entry_date }}</td>
                                    <td align="left">{{ $log->sale_rent }}</td>
                                    <td align="left"><span class="badge bg-green">{{ $log->user->operator_no }}</span></td>
                                    <td align="left"><strong>{{ $log->batch_id }}</strong></td>
                                    <td align="left">{{ $log->start_time }}</td>
                                    <td align="left">{{ $log->end_time }}</td>
                                    <td align="left">{{ $log->total_time }}</td>
                                    {!! Form::model($download,['method'=>'PATCH','url' => '/dataentries/'.$log->id,'class'=>'form-inline']) !!}
                                    <td align="left">
                                        @if($log->end_time != '00:00:00')
                                            {{ $log->records }}
                                        @else
                                            {!! Form::text('records',$log->records == 0 ? '' : $log->records,['class'=>'form-control input-sm','required'=>'true']) !!}
                                        @endif
                                    </td>
                                    <td align="left">
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



                                    {!! Form::close() !!}
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                @if($download->log_sheet->count() == 0)
                                    <td colspan="11">

                                    </td>
                                @else
                                    @if($log->end_time != '00:00:00')
                                        <td colspan="11">
                                            <div class="form-group pull-right">

                                            </div>
                                        </td>
                                    @endif
                                @endif
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>

@endsection
