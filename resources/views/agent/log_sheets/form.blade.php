    {{ csrf_field() }}

    <div class="form-group">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                {!! Form::label('sale_rent', 'Sale/Rent',['control-label']) !!}
                {!! Form::select('sale_rent',['Sale'=>'Sale','Rent'=>'Rent'],null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class="col-md-2">
                {!! Form::label('operators', 'OPTR',['control-label']) !!}
                {!! Form::text('operators',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class="col-md-5">
                {!! Form::label('batch_id', 'Batch ID',['control-label']) !!}
                {!! Form::text('batch_id',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-2 col-md-offset-1">
                {!! Form::label('start_time', 'Start Time',['control-label']) !!}
                {!! Form::time('start_time',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class="col-md-2">
                {!! Form::label('end_time', 'End Time',['control-label']) !!}
                {!! Form::time('end_time',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class="col-md-2">
                {!! Form::label('total_time', 'Total Time',['control-label']) !!}
                {!! Form::time('total_time',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class="col-md-2">
                {!! Form::label('records', 'Records',['control-label']) !!}
                {!! Form::text('records',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class="col-md-2">
                {!! Form::label('entry_date', 'Entry Date',['control-label']) !!}
                {!! Form::date('entry_date',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-2 col-md-offset-1">
                {!! Form::label('status', 'Status',['control-label']) !!}
                {!! Form::text('status',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class="col-md-2">
                {!! Form::label('remarks', 'Remarks',['control-label']) !!}
                {!! Form::text('remarks',null,['class'=>'form-control','required'=>'true']) !!}
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

