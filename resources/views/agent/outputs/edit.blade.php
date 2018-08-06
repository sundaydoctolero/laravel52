@extends('layouts.app.app',['page_header' => 'Modify Outputs'])

@section('css')
    <style>
        .custom-list{
            padding:4px;
        }
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
                    <div class="col-md-6">
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
                            <li class="list-group-item"><i>Pages : </i><strong>{{ $download->pages }}</strong></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        {!! Form::model($output,['method'=>'PATCH','url' => '/agent/outputs/'.$download->id,'class'=>'form-inline','id'=>'frmClosed']) !!}
                        {{ csrf_field() }}
                        <ul class="list-group">
                            <li class="list-group-item custom-list">
                                {!! Form::label('sale_records', 'Sale ',['class'=>'col-md-3 control-label']) !!}
                                {!! Form::number('sale_records',$download->log_sheet->where('sale_rent','Sale')->sum('records'),['class'=>'form-control control-label','required'=>'true']) !!}
                            </li>
                            <li class="list-group-item custom-list">
                                {!! Form::label('rent_records', 'Rent :',['class'=>'col-md-3 control-label']) !!}
                                {!! Form::number('rent_records',$download->log_sheet->where('sale_rent','Rent')->sum('records'),['class'=>'form-control control-label','required'=>'true']) !!}
                            </li>
                            <li class="list-group-item custom-list">
                                {!! Form::label('total_records', 'Total',['class'=>'col-md-3 control-label']) !!}
                                {!! Form::text('total_records',null,['class'=>'form-control control-label','readonly'=>'true']) !!}
                            </li>
                            <li class="list-group-item custom-list">
                                {!! Form::label('sequence_from', 'Sequence',['class'=>'col-md-3 control-label']) !!}
                                {!! Form::number('sequence_from',null,['class'=>'form-control','required'=>'true']) !!}
                                {!! Form::number('sequence_to',null,['class'=>'form-control','required'=>'true','id'=>'sequence_to']) !!}
                            </li>
                            <li class="list-group-item custom-list">
                                {!! Form::label('output_date', 'Output Date',['class'=>'col-md-3 control-label']) !!}
                                {!! Form::date('output_date',\Carbon\Carbon::now()->toDateString(),['class'=>'form-control']) !!}
                                {!! Form::hidden('status','Closed',['class'=>'form-control','required'=>'true']) !!}
                            </li>

                            <li class="list-group-item custom-list">
                                {!! Form::label('delivery_time', 'Folder',['class'=>'col-md-3 control-label']) !!}
                                {!! Form::text('delivery_time',null,['class'=>'form-control','required'=>'true']) !!}
                            </li>

                            <li class="list-group-item custom-list">
                                {!! Form::label('remarks', 'Remarks',['class'=>'col-md-3 control-label']) !!}
                                {!! Form::text('remarks',null,['class'=>'form-control']) !!}
                            </li>

                            <li class="list-group-item custom-list">
                                {!! Form::label('', '',['class'=>'col-md-3 control-label']) !!}
                                {!! Form::submit('Closed Publication',['class'=>'btn btn-danger form-control']) !!}
                            </li>
                        </ul>
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
                        <th>Id</th>
                        <th>State</th>
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
                            <td>{{ $log->state }}</td>
                            <td>{{ $log->sale_rent }}</td>
                            <td><small class="label label-success">{{ $log->user->operator_no }}</small></td>
                            <td>{{ $log->batch_id }}</td>
                            <td>{{ $log->start_time }}</td>
                            <td>{{ $log->end_time }}</td>
                            <td>{{ $log->total_time }}</td>
                            <td>{{ $log->records }}</td>
                            <td>{{ $log->entry_date }}</td>
                            <td>{{ $log->status}}</td>
                            <td>{{ $log->remarks }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Records Per State Summary</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tr>
                    <th style="width: 100px">State</th>
                    <th>Task</th>
                    <th>Records</th>
                </tr>
                @foreach($records_summaries as $summary)
                <tr>
                    <td>{{ $summary->state }}</td>
                    <td>{{ $summary->sale_rent }}</td>
                    <td>{{ $summary->total_records }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>

@endsection

@push('scripts')
   <script>
       $( document ).ready(function() {

           total_records();

           $( "#sale_records" ).keyup(function() {
               total_records();
           });

           $( "#rent_records" ).keyup(function() {
               total_records();
           });

           $("#sale_records").focus().select();

           $("#frmClosed").submit(function(e){
               var sequence_total;
               var total;
               total = parseInt($('#sale_records').val()) + parseInt($('#rent_records').val());
               sequence_total =  parseInt(parseInt($('#sequence_to').val()) -  parseInt($('#sequence_from').val()) + 1) ;


               if(total === sequence_total){
                   return true;
               } else if(total == 0 ){
                   if(parseInt($('#sequence_to').val()) == 0 && parseInt($('#sequence_from').val()) == 0 ){
                       return true;
                   } else {
                       alert('Sequence From and To should be 0!!!')
                       e.preventDefault();
                   }
               } else {
                   alert('Total Records does not match with sequence numbers.!!!')
                   e.preventDefault();
               }
           });

           function total_records(){
               total = parseInt($('#sale_records').val()) + parseInt($('#rent_records').val())
               $('#total_records').val(total);
           }
       });
   </script>
@endpush
