    {{ csrf_field() }}

    {!! Form::label('user_id', 'User ID') !!}
    {!! Form::text('user_id',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('ip_address', 'IP Address') !!}
    {!! Form::text('ip_address',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('computer_name', 'Computer Name') !!}
    {!! Form::text('computer_name',null,['class'=>'form-control','required'=>'true']) !!}


    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

