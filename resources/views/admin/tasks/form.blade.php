    {{ csrf_field() }}
    {!! Form::label('task_name', 'Task Name') !!}
    {!! Form::text('task_name',null,['class'=>'form-control']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description',null,['class'=>'form-control']) !!}

    {!! Form::label('completion_date', 'Completion Date') !!}
    {!! Form::date('completion_date',null,['class'=>'form-control']) !!}
    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

