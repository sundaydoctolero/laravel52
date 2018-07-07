    {{ csrf_field() }}

    {!! Form::label('filename', 'Filename') !!}
    {!! Form::text('filename',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('backup_size', 'Backup Size') !!}
    {!! Form::text('backup_size',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('description', 'Backup Description') !!}
    {!! Form::text('description',null,['class'=>'form-control','required'=>'true']) !!}


    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

