    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('username', 'Username') !!}
                            {!! Form::text('username',null,['class'=>'form-control','required'=>'true']) !!}


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">

                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-3 col-md-offset-3">
                            {!! Form::label('operator_no', 'Optr No.') !!}
                            {!! Form::text('operator_no',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                        <div class = "col-md-3">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status',['Active'=>'Active','Blocked'=>'Blocked'],null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('user_photo', 'Upload Image') !!}
                            {!! Form::file('user_photo') !!}
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


