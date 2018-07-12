    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('state_code', 'State Code') !!}
                            {!! Form::text('state_code',null,['class'=>'form-control','required'=>'true']) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">

                            {!! Form::label('state', 'State') !!}
                            {!! Form::text('state',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                {!! Form::submit($buttonlabel,['class'=>'btn btn-primary col-md-2 col-md-offset-7']) !!}

                {!! Form::close() !!}
            </font>
        </tt>
    </div>



    @include('errors.error')

