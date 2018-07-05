
    {{csrf_field()}}
    <font color = #db7093>
  {!! Form::label('site_name','Site Name') !!}
    {!! Form::text('site_name',null, ['class' => 'form-control']) !!}



        {!! Form::label('company_name','Company Name') !!}
        {!! Form::text('company_name',null, ['class' => 'form-control']) !!}

        {!! Form::label('logo','Upload Logo') !!}
        {!! Form::file('logo') !!}


        {!! Form::label('theme','Theme') !!}
        {!! Form::text('theme',null, ['class' => 'form-control']) !!}


        {!! Form::label('website','Website') !!}
        {!! Form::text('website',null, ['class' => 'form-control']) !!}

        <br>
        {!! Form::submit($buttonlabel, ['class'=>'btn btn-primary form-control']) !!}

{!! Form::close() !!}


    </font>

<br>
  @include('errors.error' )

