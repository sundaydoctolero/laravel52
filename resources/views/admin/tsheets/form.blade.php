    {{ csrf_field() }}
    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-xs-6 col-md-offset-3">
                            {!! Form::label('jobnumber_id', 'Job Number') !!}
                            {!! Form::select('jobnumber_id',\App\JobNumber::lists('job_number_description','id'),null,['class'=>'form-control','required'=>'true','placeholder'=>'Select Job Number']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-3 col-xs-6 col-md-offset-3">
                            {!! Form::label('start_time', 'Start Time') !!}
                            {!! Form::text('start_time',null,['class'=>'form-control','required']) !!}
                        </div>

                        <div class = "col-md-3 col-xs-6">
                            {!! Form::label('end_time', 'End Time') !!}
                            {!! Form::text('end_time',null,['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-3 col-xs-6 col-md-offset-3">
                            {!! Form::label('total_records', 'Records') !!}
                            {!! Form::number('total_records',null,['class'=>'form-control']) !!}
                        </div>

                        <div class = "col-md-3 col-xs-6">
                        {!! Form::label('remarks', 'Remarks') !!}
                        {!! Form::text('remarks',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <br>
                {!! Form::submit($buttonlabel,['class'=>'btn btn-primary col-md-2 col-md-offset-7']) !!}

                {!! Form::close() !!}


            </font>
        </tt>
    </div>




    @include('errors.error')

