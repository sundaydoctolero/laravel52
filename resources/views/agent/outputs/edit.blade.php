@extends('layouts.app.app',['page_header' => 'Modify Outputs'])

@section('css')
    <style>
        .custom-list{
            padding:4px;
        }
    </style>
@endsection

@section('main-content')
    @include('agent.outputs.modal_form')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><strong>{{ $download->publication->publication_name.' '.$download->publication_date.'  ['.$download->publication->publication_code.']' }}</strong></h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <button id="btn-add" name="btn-add" class="btn btn-success btn-md addbutton pull-right"><span class="glyphicon glyphicon-plus"></span> Additional</button>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table id="data_table" class="table table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">Output Date</th>
                            <th>State</th>
                            <th class="text-right">Sale</th>
                            <th class="text-right">Rent</th>
                            <th class="text-right">Total</th>
                            <th class="text-center">Sequence From</th>
                            <th class="text-center">Sequence To</th>
                            <th class="text-center">Folder Name</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($records as $record)
                            @if($outputs->where('state',$record->state)->count() >= 1 )
                                @foreach($outputs->where('state',$record->state) as $output)
                                    <tr id="batch{{$output->id}}">
                                        <td class="text-center">{{ $output->output_date }}</td>
                                        <td>{{ $output->state }}</td>
                                        <td class="text-right">{{ $output->sale_records }}</td>
                                        <td class="text-right">{{ $output->rent_records }}</td>
                                        <td class="text-right">{{ $output->total_records }}</td>
                                        <td class="text-center">{{ $output->sequence_from }}</td>
                                        <td class="text-center">{{ $output->sequence_to}}</td>
                                        <td class="text-center">{{ $output->delivery_time }}</td>
                                        <td>{{ $output->remarks }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @else
                                {!! Form::open(['url' => '/agent/output/'.$download->id.'/create','class'=>'output']) !!}
                                <tr>
                                    <td class="text-center">
                                        {{ today() }}
                                        {{ Form::hidden('output_date',today()) }}
                                    </td>
                                    <td>
                                        {{ $record->state }}
                                        {!! Form::hidden('state',$record->state) !!}
                                    </td>
                                    <td class="text-right">
                                        {{ $record->sale }}
                                        {!! Form::hidden('sale_records',$record->sale) !!}
                                    </td>
                                    <td class="text-right">
                                        {{ $record->rent == null ? 0 : $record->rent }}
                                        {!! Form::hidden('rent_records',$record->rent) !!}
                                    </td>
                                    <td class="text-right">{{ $record->total }}</td>
                                    <td>{!! Form::text('sequence_from',null,['class'=>'sequence_from form-control input-sm text-center']) !!}</td>
                                    <td>{!! Form::text('sequence_to',null,['class'=>'form-control input-sm text-center','required' ]) !!}</td>
                                    <td>{!! Form::text('delivery_time',null,['class'=>'form-control input-sm','required' ]) !!}</td>
                                    <td>{!! Form::text('remarks',null,['class'=>'form-control input-sm']) !!}</td>

                                    <td>{!! Form::submit('UPDATE',['class'=>'form-control input-sm btn btn-warning']) !!}</td>
                                </tr>
                                {!! Form::close() !!}
                            @endif
                        @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="10">
                                    @if($outputs->groupBy('state')->count() == $download->log_sheet->groupBy('state')->count())
                                        {!! Form::model($download,['method'=>'PATCH','url' => '/agent/outputs/'.$download->id,'class'=>'form-horizontal']) !!}
                                        {{ Form::button('<span class="glyphicon glyphicon-plus"></span> Closed Publication', ['type' => 'submit', 'class' => 'form-control btn btn-danger'] )  }}
                                        {!! Form::close() !!}
                                    @endif

                                </td>
                            </tr>
                        </tfoot>
                    </table>
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
                        {!! Form::model($log,['method'=>'PATCH','url' => '/agent/output/'.$log->id.'/modify_log','class'=>'form-horizontal']) !!}
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->state }}</td>
                                <td>{{ $log->sale_rent }}</td>
                                <td><small class="label label-success">{{ $log->user->operator_no }}</small></td>
                                <td>{{ $log->batch_id }}</td>
                                <td>{{ $log->start_time }}</td>
                                <td>{{ $log->end_time }}</td>
                                <td>{{ $log->total_time }}</td>
                                <td class="text-right">{!! Form::text('records',null,['class'=>'form-control input-sm text-right']) !!}</td>
                                <td>{{ $log->entry_date }}</td>
                                <td>{{ $log->status}}</td>
                                <td>{{ $log->remarks }}</td>
                                @unless($outputs->groupBy('state')->count() == $download->log_sheet->groupBy('state')->count())
                                    <td>{!! Form::submit("Update",['class' => 'form-control btn btn-danger btn-sm'] ) !!}</td>
                                @endunless
                            </tr>
                        {!! Form::close() !!}
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
            </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <div class="col-md-offset-1">
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection

@push('scripts')
   <script>
       //$( document ).ready(function() {
        //   $('form.output').each(function () {
          //     $(this).validate({
           //        submitHandler : function(event) {

                        //sequence_from = $(this > '.sequence-from').val();

                        //alert(sequence_from);



                       //event.preventDefault();
                       //form.submit();
                   //}
               //});
           ///});





       //});
   </script>

   <script>
       $( document ).ready(function() {
           // ADD button ::
           $('#btn-add').click(function(){
               $("#frmBatch").attr("action", "/agent/output/" + {{ $download->id }} +"/create" );
               $('#frmBatch').trigger("reset");
               $('.modal-title').html('Add New Output Record');
               $('#output_date').val();
               $('#btn-save').html("Save");
               $('#myModal').modal('show');
           });

           // UPDATE button ::
           $('.open-modal').click(function(){
               $("#frmBatch").attr("action", "/agent/output/" + $(this).val()  );
               $.get('/agent/output/' + $(this).val() + '/edit_output', function (data) {
                   console.log(data);
                   $('#state').val(data.state);
                   $('#output_date').val(data.output_date);
                   $('#sale_records').val(data.sale_records);
                   $('#rent_records').val(data.rent_records);
                   $('#total_records').val(data.sale_records + data.rent_records);
                   $('#sequence_from').val(data.sequence_from);
                   $('#sequence_to').val(data.sequence_to);
                   $('#delivery_time').val(data.delivery_time);
                   $('.modal-title').html('Update Record');
                   $('#btn-save').html("Update");
                   $('#jobnumber').focus();
               })
           });


           total_records();

           $( "#sale_records" ).keyup(function() {
               total_records();
           });

           $( "#rent_records" ).keyup(function() {
               total_records();
           });

           $("#sale_records").focus().select();

           $("#frmBatch").submit(function(e){
               var sequence_total;
               var total;

               total = parseInt($('#sale_records').val()) + parseInt($('#rent_records').val());
               sequence_total =  (parseInt(parseInt($('#sequence_to').val()) -  parseInt($('#sequence_from').val()) + 1));

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
                   alert('Total Records does not match with sequence numbers.!!!' + sequence_total)
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
