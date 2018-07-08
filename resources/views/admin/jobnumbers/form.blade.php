    {{ csrf_field() }}

    {!! Form::label('job_number_id', 'Job Number') !!}
    {!! Form::text('job_number_id',null,['class'=>'form-control']) !!}

    {!! Form::label('job_number_description', 'Job Number Description') !!}
    {!! Form::text('job_number_description',null,['class'=>'form-control']) !!}

    {!! Form::label('month_of', 'Month Of') !!}
    {!! Form::date('month_of',null,['class'=>'form-control']) !!}


    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

