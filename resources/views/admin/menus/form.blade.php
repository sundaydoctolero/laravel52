    {{ csrf_field() }}
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title',null,['class'=>'form-control','required'=>'true']) !!}


    {!! Form::label('url', 'Url') !!}
    {!! Form::text('url',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('icon', 'Icon') !!}
    {!! Form::text('icon',null,['class'=>'form-control','required'=>'true']) !!}


    <hr>

    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}



