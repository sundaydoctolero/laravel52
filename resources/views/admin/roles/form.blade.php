    {{ csrf_field() }}
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}

    {!! Form::label('display_name', 'Display Name') !!}
    {!! Form::text('display_name',null,['class'=>'form-control']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description',null,['class'=>'form-control']) !!}

    <hr>

    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

