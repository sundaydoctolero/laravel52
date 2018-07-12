    {{ csrf_field() }}
    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('dept_name', 'Department Name') !!}
                            {!! Form::text('dept_name',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('dept_code', 'Department Code') !!}
                            {!! Form::text('dept_code',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('dept_description', 'Department Description') !!}
                            {!! Form::text('dept_description',null,['class'=>'form-control','required'=>'true']) !!}
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

