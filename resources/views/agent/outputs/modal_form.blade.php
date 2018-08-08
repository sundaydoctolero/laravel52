<div id="myModal" class="modal modal-primary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Batch</h4>
            </div>

            <form class="form-horizontal" action="/agent/output/{{$download->id}}/create" method="post" id="frmBatch">
                <div class="modal-body">
                    {{ csrf_field() }}

                    <div class="form-group">
                        {!! Form::label('output_date','Output Date',['class'=>'control-label col-sm-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::date('output_date',\Carbon\Carbon::now(),['class'=>'form-control', 'required','autofocus']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('state','State',['class'=>'control-label col-sm-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::select('state',$download->log_sheet->lists('state','state'),null,['class'=>'form-control input-sm','required'=>'true']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('sale_records','Sale',['class'=>'control-label col-sm-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::number('sale_records', null, ['class'=>'form-control text-right','required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('rent_records','Rent',['class'=>'control-label col-sm-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::number('rent_records', null, ['class'=>'form-control text-right','required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('total_records','Total',['class'=>'control-label col-sm-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::number('total_records', null, ['class'=>'form-control text-right','readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('sequence_from','Sequence From',['class'=>'control-label col-sm-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::number('sequence_from', null, ['class'=>'form-control text-right','required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('sequence_to','To',['class'=>'control-label col-sm-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::number('sequence_to', null, ['class'=>'form-control text-right','required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('delivery_time','Folder Name',['class'=>'control-label col-sm-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('delivery_time',null,['class'=>'form-control','required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('remarks','Remarks',['class'=>'control-label col-sm-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('remarks',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline" id="btn-save" value="add">Save</button>
                </div>

            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

