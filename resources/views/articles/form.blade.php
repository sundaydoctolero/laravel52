    {{ csrf_field() }}
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}

    {!!  Form::label('body', 'Body') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}

    {!!  Form::label('published_at', 'Published On') !!}
    {!! Form::date('published_at', \Carbon\Carbon::now(),['class'=>'form-control']) !!}

    <hr>

    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

