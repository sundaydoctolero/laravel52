    {{ csrf_field() }}

    <div class="form-group">
        {!! Form::label('jobnumber_id', 'Job Number') !!}
        {!! Form::select('jobnumber_id',$job_numbers,null,['class'=>'form-control','required'=>'true','placeholder'=>'Select Job Number']) !!}
    </div>

    {!! Form::label('total_records', 'Records') !!}
    {!! Form::number('total_records',null,['class'=>'form-control']) !!}

    {!! Form::label('remarks', 'Remarks') !!}
    {!! Form::text('remarks',null,['class'=>'form-control']) !!}

    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

