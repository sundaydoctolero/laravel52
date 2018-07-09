{!! Form::open(['url' => '/agent/tsheets/create','class'=>'form-inline']) !!}
{{ csrf_field() }}

<div class="form-group">
    {!! Form::select('jobnumber_id',\App\JobNumber::lists('job_number_description','id'),null,['class'=>'form-control','required'=>'true','placeholder'=>'Select Job Number']) !!}
</div>

{!! Form::submit('Start Job',['class'=>'btn btn-primary form-control']) !!}

{!! Form::close() !!}


@include('errors.error')