    {{ csrf_field() }}

    {!! Form::label('publication_type', 'Publication Type') !!}
    {!! Form::text('publication_type',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('publication_description', 'Publication Description') !!}
    {!! Form::text('publication_description',null,['class'=>'form-control','required'=>'true']) !!}


    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

