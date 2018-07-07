    {{ csrf_field() }}
    {!! Form::label('firstname', 'First Name') !!}
    {!! Form::text('firstname',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('lastname', 'Last Name') !!}
    {!! Form::text('lastname',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('company_name', 'Company Name') !!}
    {!! Form::text('company_name',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('landline', 'Landline') !!}
    {!! Form::text('landline',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('website', 'Website') !!}
    {!! Form::text('website',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('mobile_1', 'Mobile 1') !!}
    {!! Form::text('mobile_1',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('mobile_2', 'Mobile 2') !!}
    {!! Form::text('mobile_2',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('skype_id', 'Skype Id') !!}
    {!! Form::text('skype_id',null,['class'=>'form-control','required'=>'true']) !!}

    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

