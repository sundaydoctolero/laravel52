    {{ csrf_field() }}
    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('rack_id', 'Rack ID') !!}
                            {!! Form::text('rack_id',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('ip_address', 'IP Address') !!}
                            {!! Form::text('ip_address',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('workstation_id', 'Workstation ID') !!}
                            {!! Form::text('workstation_id',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('table', 'Table') !!}
                            {!! Form::text('table',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('location', 'Location') !!}
                            {!! Form::text('location',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('operator', 'Operator') !!}
                            {!! Form::text('operator',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('comp_name', 'Comp Name') !!}
                            {!! Form::text('comp_name',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('mac_address', 'Mac Address') !!}
                            {!! Form::text('mac_address',null,['class'=>'form-control','required'=>'true']) !!}
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

