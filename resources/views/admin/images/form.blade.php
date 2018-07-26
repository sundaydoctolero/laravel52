    {{ csrf_field() }}

    {!! Form::label('image_name', 'Image Name') !!}
    {!! Form::text('image_name',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('image_path', 'Image Path') !!}
    {!! Form::text('image_path',null,['class'=>'form-control','required'=>'true']) !!}



    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

