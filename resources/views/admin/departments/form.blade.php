    {{ csrf_field() }}

    {!! Form::label('dept_name', 'Department Name') !!}
    {!! Form::text('dept_name',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('dept_code', 'Department Code') !!}
    {!! Form::text('dept_code',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('dept_description', 'Department Description') !!}
    {!! Form::text('dept_description',null,['class'=>'form-control','required'=>'true']) !!}


    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

