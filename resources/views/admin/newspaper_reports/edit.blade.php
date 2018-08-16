@extends('layouts.admin.admin',['page_header' => 'Modify Reports'])

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
                    {!! Form::model($download,['method'=>'PATCH','url' => '/outputs/'.$download->id]) !!}
                    @include('admin.newspaper_reports.form',['buttonlabel'=>'Update Output'])
                    {!! Form::close() !!}
                </div>

                <div class="box box-solid box-info">
                    <div class="box-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th BGCOLOR="#faebd7" colspan="11">LOG SHEET DETAILS</th>
                            </tr>
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
                        </table>
                    </div>

                </div>

                <div class="box box-solid box-danger">
                    <div class="box-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th BGCOLOR="#faebd7" colspan="11">OUTPUT DETAILS</th>
                            </tr>
                            <tr>
                                <th>Output Date</th>
                                <th class="text-center">Sale</th>
                                <th class="text-center">Rent</th>
                                <th class="text-center">Total Records</th>
                                <th align="center">Sequence From</th>
                                <th align="center">Sequence To</th>
                                <th class="text-center">Folder</th>
                                <th class="text-center">Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($outputs as $output)
                                    {!! Form::model($output,['method'=>'PATCH','url' => '/newspaper_reports/'.$output->id.'/edit_output_details','class'=>'output-form']) !!}
                                    {{ csrf_field() }}
                                    <tr>
                                        <td align="left">{{ $output->output_date }}</td>
                                        <td><strong>{{ Form::text('sale_records',null,['class'=>'form-control text-right','id'=>'sale_records','required'=>'true']) }}</strong></td>
                                        <td><strong>{{ Form::text('rent_records',null,['class'=>'form-control text-right','id'=>'rent_records','required'=>'true']) }}</strong></td>
                                        <td><strong>{{ Form::text('total_records',null,['class'=>'form-control text-right','id'=>'total_records','readonly'=>'true']) }}</strong></td>
                                        <td><strong>{{ Form::text('sequence_from',null,['class'=>'form-control text-center','id'=>'sequence_from','required'=>'true']) }}</strong></td>
                                        <td><strong>{{ Form::text('sequence_to',null,['class'=>'form-control text-center','id'=>'sequence_to','required'=>'true']) }}</strong></td>
                                        <td><strong>{{ Form::text('delivery_time',null,['class'=>'form-control text-center']) }}</strong></td>
                                        <td><strong>{{ Form::text('remarks',null,['class'=>'form-control text-center']) }}</strong></td>
                                        <td class="text-center">{!! Form::submit('Update Output',['class'=>'form-control btn btn-success']) !!}</td>
                                    </tr>
                                    {!! Form::close() !!}
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
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

        $(".output-form").submit(function(e){
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
