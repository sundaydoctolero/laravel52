@extends('layouts.app.app',['page_header' => 'T sheets'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job Number</th>
                            <th>Description</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Total Hours</th>
                            <th>Total Records</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tsheets as $e => $tsheet)
                            <tr>
                                <td>{{ $e++ + 1 }}</td>
                                <td>{{ $tsheet->job_number['job_number_id'] }}</td>
                                <td>{{ $tsheet->job_number['job_number_description'] }}</td>
                                <td>{{ $tsheet->start_time }}</td>
                                <td>{{ $tsheet->end_time }}</td>
                                <td>{{ $tsheet->total_hours }}</td>

                                @if($tsheet->end_time == '00:00:00')
                                    {!! Form::model($tsheet,['method'=>'PATCH','url' => '/agent/tsheets/'.$tsheet->id,'style'=>'display:inline']) !!}
                                    <td>
                                        {!! Form::number('total_records',null,['class'=>'form-control','placeholder'=>'0']) !!}
                                    </td>
                                    <td>
                                        {!! Form::text('remarks',null,['class'=>'form-control','placeholder'=>'0']) !!}
                                    </td>
                                    <td>
                                        {!! Form::hidden('jobnumber_id') !!}
                                        {!! Form::hidden('description') !!}
                                        {{ Form::button('<i class="fa fa-link"></i> Stop Job', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                        {!! Form::close() !!}
                                    </td>
                                @else
                                    <td>{!! Form::number('total_records',$tsheet->total_records,['class'=>'form-control','placeholder'=>'0']) !!}</td>
                                    <td>{!! Form::text('remarks',$tsheet->remarks,['class'=>'form-control','placeholder'=>'--']) !!}</td>
                                    <td>
                                        
                                    </td>

                                @endif

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="11">
                                @if($tsheet_status != null)
                                    @if($tsheet_status->end_time != '00:00:00')
                                        @include('agent.tsheets.inline_form')
                                    @endif
                                @else
                                    @include('agent.tsheets.inline_form')
                                @endif

                            </td>

                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection












