    {{ csrf_field() }}
    {!! Form::label('name', 'Display Name') !!}
    {!! Form::text('name',auth()->user()->name,['class'=>'form-control']) !!}

    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username',auth()->user()->username,['class'=>'form-control']) !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email',auth()->user()->email,['class'=>'form-control']) !!}

    {!! Form::label('firstname', 'Firstname') !!}
    {!! Form::text('firstname',null,['class'=>'form-control']) !!}

    {!! Form::label('lastname', 'Lastname') !!}
    {!! Form::text('lastname',null,['class'=>'form-control']) !!}

    {!! Form::label('department_id', 'Department') !!}
    {!! Form::select('department_id',$department_lists,null,['class'=>'form-control','placeholder'=>'Select Department']) !!}

    {!! Form::label('birthdate', 'Birth Date') !!}
    {!! Form::date('birthdate',null,['class'=>'form-control']) !!}

    {!! Form::label('gender', 'Gender') !!}
    {!! Form::select('gender',['Male'=>'Male','Female'=>'Female'],null,['class'=>'form-control']) !!}

    {!! Form::label('contact', 'Contact') !!}
    {!! Form::text('contact',null,['class'=>'form-control']) !!}

    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address',null,['class'=>'form-control']) !!}

    {!! Form::label('designation', 'Designation') !!}
    {!! Form::text('designation',null,['class'=>'form-control']) !!}

    {!! Form::label('date_hired', 'Date Hired') !!}
    {!! Form::date('date_hired',null,['class'=>'form-control']) !!}

    {!! Form::label('date_left', 'Date Left') !!}
    {!! Form::date('date_left',null,['class'=>'form-control']) !!}

    {!! Form::label('user_photo', 'Upload Image') !!}
    {!! Form::file('user_photo') !!}

    {!! Form::label('old_password', 'Current Password') !!}
    {!! Form::password('old_password',['class'=>'form-control']) !!}

    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password',['class'=>'form-control']) !!}

    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}



