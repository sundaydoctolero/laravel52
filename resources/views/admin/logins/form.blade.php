    {{ csrf_field() }}

    {!! Form::label('user_id', 'User ID') !!}
    {!! Form::text('user_id',null,['class'=>'form-control']) !!}

    {!! Form::label('ip_address', 'IP Address') !!}
    {!! Form::text('ip_address',null,['class'=>'form-control']) !!}

    {!! Form::label('computer_name', 'Computer Name') !!}
    {!! Form::text('computer_name',null,['class'=>'form-control']) !!}


    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

