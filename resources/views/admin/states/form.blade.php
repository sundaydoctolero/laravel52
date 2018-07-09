    {{ csrf_field() }}

    {!! Form::label('state_code', 'State Code') !!}
    {!! Form::text('state_code',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('state', 'State') !!}
    {!! Form::text('state',null,['class'=>'form-control','required'=>'true']) !!}



    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

