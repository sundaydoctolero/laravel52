{!! Form::open(['url' => '/tsheets/create','class'=>'form-inline']) !!}
{{ csrf_field() }}

<div class="form-group">
    {!! Form::text('jobnumber_id',null,['class'=>'form-control','required'=>'true','placeholder'=>'Job Number']) !!}
</div>

<div class="form-group">
    {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Description']) !!}
</div>

{!! Form::submit('Start Job',['class'=>'btn btn-primary form-control']) !!}

{!! Form::close() !!}


@include('errors.error')