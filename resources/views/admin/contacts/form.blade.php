    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-5 col-xs-6 col-md-offset-1">
                            {!! Form::label('firstname', 'First Name') !!}
                            {!! Form::text('firstname',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                        <div class = "col-md-5 col-xs-6">
                            {!! Form::label('lastname', 'Last Name') !!}
                            {!! Form::text('lastname',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-10 col-md-offset-1">
                            {!! Form::label('company_name', 'Company Name') !!}
                            {!! Form::text('company_name',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-10 col-md-offset-1">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-10 col-md-offset-1">
                            {!! Form::label('website', 'Website') !!}
                            {!! Form::text('website',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-5 col-xs-6 col-md-offset-1">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                        <div class = "col-md-5 col-xs-6">
                            {!! Form::label('skype_id', 'Skype Id') !!}
                            {!! Form::text('skype_id',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-4 col-xs-4  col-md-offset-1  ">
                            {!! Form::label('landline', 'Landline') !!}
                            {!! Form::text('landline',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                        <div class = "col-md-3 col-xs-4">
                            {!! Form::label('mobile_1', 'Mobile 1') !!}
                            {!! Form::text('mobile_1',null,['class'=>'form-control','required'=>'true']) !!}

                        </div>
                        <div class = "col-md-3 col-xs-4  ">
                            {!! Form::label('mobile_2', 'Mobile 2') !!}
                            {!! Form::text('mobile_2',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <hr>

                {!! Form::submit($buttonlabel,['class'=>'btn btn-primary col-md-3 col-md-offset-8']) !!}

                {!! Form::close() !!}
            </font>
        </tt>
    </div>


    @include('errors.error')

