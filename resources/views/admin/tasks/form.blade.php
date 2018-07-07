    {{ csrf_field() }}
    {!! Form::label('task_name', 'Task Name') !!}
    {!! Form::text('task_name',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status',['Open'=>'Open','Pending'=>'Pending','Closed'=>'Closed'],null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('comments', 'Comments') !!}
    {!! Form::textarea('comments',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('completion_date', 'Completion Date') !!}
    {!! Form::date('completion_date',null,['class'=>'form-control','required'=>'true']) !!}
    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

