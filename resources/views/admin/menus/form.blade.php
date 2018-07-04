    {{ csrf_field() }}
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}


    {!! Form::label('url', 'Url') !!}
    {!! Form::text('url',null,['class'=>'form-control']) !!}

    {!! Form::label('icon', 'Icon') !!}
    {!! Form::text('icon',null,['class'=>'form-control']) !!}


    <hr>

    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}



