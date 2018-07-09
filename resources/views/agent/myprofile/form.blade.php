    {{ csrf_field() }}
    {!! Form::label('name', 'Display Name') !!}
    {!! Form::text('name',auth()->user()->name,['class'=>'form-control','require'=>'true']) !!}

    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username',auth()->user()->username,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email',auth()->user()->email,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('firstname', 'Firstname') !!}
    {!! Form::text('firstname',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('lastname', 'Lastname') !!}
    {!! Form::text('lastname',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('department_id', 'Department') !!}
    {!! Form::select('department_id',$department_lists,null,['class'=>'form-control','required'=>'true','placeholder'=>'Select Department']) !!}

    {!! Form::label('birthdate', 'Birth Date') !!}
    {!! Form::date('birthdate',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('gender', 'Gender') !!}
    {!! Form::select('gender',['Male'=>'Male','Female'=>'Female'],null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('contact', 'Contact') !!}
    {!! Form::text('contact',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('designation', 'Designation') !!}
    {!! Form::text('designation',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('date_hired', 'Date Hired') !!}
    {!! Form::date('date_hired',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('date_left', 'Date Left') !!}
    {!! Form::date('date_left',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('user_photo', 'Upload Image') !!}
    {!! Form::file('user_photo') !!}

    {!! Form::label('old_password', 'Current Password') !!}
    {!! Form::password('old_password',['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password',['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation',['class'=>'form-control','required'=>'true']) !!}
    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}



