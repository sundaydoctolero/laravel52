    {{ csrf_field() }}

    {!! Form::label('issue_name', 'Issue Name') !!}
    {!! Form::text('issue_name',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('issue_description', 'Issue Description') !!}
    {!! Form::text('issue_description',null,['class'=>'form-control','required'=>'true']) !!}


    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

