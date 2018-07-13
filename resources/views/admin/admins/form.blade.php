    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-8 col-md-offset-2">}
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-8 col-md-offset-2">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-8 col-md-offset-2">
                            {!! Form::label('role_list', 'Roles') !!}
                            {!! Form::select('role_list[]', $role_lists, null, ['class'=>'form-control','required'=>'true','id'=>'role_list','multiple'=>'true']) !!}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-4 col-md-offset-2">
                            {!! Form::label('username', 'Username') !!}
                            {!! Form::text('username',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-4 col-md-offset-2">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password',['class'=>'form-control']) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-4 col-md-offset-2">
                            {!! Form::label('password_confirmation', 'Confirm Password') !!}
                            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-4 col-md-offset-2">
                            {!! Form::label('user_photo', 'Upload Image') !!}
                            {!! Form::file('user_photo') !!}
                        </div>
                    </div>
                </div>



                <br>
                {!! Form::submit($buttonlabel,['class'=>'btn btn-primary col-md-3 col-md-offset-7']) !!}
                {!! Form::close() !!}

            </font>
        </tt>
    </div>




