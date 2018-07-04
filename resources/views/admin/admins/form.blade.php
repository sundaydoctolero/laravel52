    {{ csrf_field() }}
    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username',null,['class'=>'form-control']) !!}

    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email',null,['class'=>'form-control']) !!}

    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password',['class'=>'form-control']) !!}

    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}

    {!! Form::label('user_photo', 'Upload Image') !!}
    {!! Form::file('user_photo') !!}
    <div class="form-group">
    {!! Form::label('role_list', 'Roles') !!}
    {!! Form::select('role_list[]', $role_lists, null, ['class'=>'form-control','id'=>'role_list','multiple'=>'true']) !!}

    </div>

    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}
    {!! Form::close() !!}



