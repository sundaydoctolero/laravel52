    {{ csrf_field() }}


    <div class="form-group">
        <div class="row">
            {!! Form::label('sale_records', 'Sale:',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
            <div class="col-md-2">
                {!! Form::text('sale_records',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            {!! Form::label('rent_records', 'Rent:',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
            <div class="col-md-2">
                {!! Form::text('rent_records',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            {!! Form::label('sequence_from', 'Sequence From',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
            <div class="col-md-2">
                {!! Form::text('sequence_from',null,['class'=>'form-control']) !!}
            </div>
            {!! Form::label('sequence_to', 'Sequence To',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
            <div class="col-md-2">
                {!! Form::text('sequence_to',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            {!! Form::label('output_date', 'Output Date',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
            <div class="col-md-2">
                {!! Form::date('output_date',\Carbon\Carbon::now()->toDateString(),['class'=>'form-control']) !!}
            </div>
            {!! Form::label('delivery_time', 'Delivery Time',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
            <div class="col-md-2">
                {!! Form::text('delivery_time',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            {!! Form::label('status', 'Status',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
            <div class="col-md-2">
                {!! Form::select('status',$status_lists,null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            {!! Form::label('remarks', 'Remarks',['class'=>'col-md-2 control-label col-md-offset-1']) !!}
            <div class="col-md-2">
                {!! Form::text('remarks',null,['class'=>'form-control']) !!}
            </div>
        </div>
    </div>


    <hr>
    <div class="form-group">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {!! Form::submit($buttonlabel,['class'=>'col-md-1 btn btn-primary form-control ']) !!}
            </div>
                {!! Form::close() !!}
        </div>
    </div>


    @include('errors.error')

