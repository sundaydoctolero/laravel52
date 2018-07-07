    {{ csrf_field() }}
    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('user_photo', 'Upload Image') !!}
    {!! Form::file('user_photo') !!}

    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}



