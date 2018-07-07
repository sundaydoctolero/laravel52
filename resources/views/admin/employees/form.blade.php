    {{ csrf_field() }}
    {!! Form::label('firstname', 'Firstname') !!}
    {!! Form::text('firstname',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('lastname', 'Lastname') !!}
    {!! Form::text('lastname',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('department_id', 'Department') !!}
    {!! Form::select('department_id',\App\Department::lists('dept_name','id'),null,['class'=>'form-control','required'=>'true','placeholder'=>'Select Department']) !!}

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





    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

