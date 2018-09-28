    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('holiday_date', 'Date') !!}
                            {!! Form::date('holiday_date',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('holiday_type', 'Holiday Type') !!}
                            {!! Form::select('holiday_type',$type_list,null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('holiday_name', 'Holiday Name') !!}
                            {!! Form::text('holiday_name',null,['class'=>'form-control','required'=>'true']) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('holiday_code', 'Code') !!}
                            {!! Form::text('holiday_code',null,['class'=>'form-control','required'=>'true']) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('holiday_rate', 'Rate (%)') !!}
                            {!! Form::text('holiday_rate',null,['class'=>'form-control','required'=>'true']) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('remarks', 'Description') !!}
                            {!! Form::text('remarks',null,['class'=>'form-control','required'=>'true']) !!}

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


