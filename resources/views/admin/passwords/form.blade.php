    {{ csrf_field() }}
    {!! Form::label('product_key', 'Product Key') !!}
    {!! Form::text('product_key',null,['class'=>'form-control']) !!}

    {!! Form::label('user_name', 'User Name') !!}
    {!! Form::text('user_name',null,['class'=>'form-control']) !!}

    {!! Form::label('password', 'Password') !!}
    {!! Form::text('password',null,['class'=>'form-control']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description',null,['class'=>'form-control']) !!}

    {!! Form::label('account_name', 'Account Name') !!}
    {!! Form::text('account_name',null,['class'=>'form-control']) !!}


    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

