    {{ csrf_field() }}

    <div class = "container" >
    <tt>
        <font face = "microsoft sans serif">
        <div class="row">
            <div class="form-group">
                <div class = "col-md-2 col-md-offset-1">
                    {!! Form::label('name', 'Display Name') !!}
                    {!! Form::text('name',auth()->user()->name,['class'=>'form-control','require'=>'true']) !!}
                </div>
                <div class = "col-md-3">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username',auth()->user()->username,['class'=>'form-control','required'=>'true']) !!}
                </div>
                <div class = "col-md-3">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email',auth()->user()->email,['class'=>'form-control','required'=>'true']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class = "col-md-4 col-xs-6 col-md-offset-1">
                    {!! Form::label('firstname', 'Firstname') !!}
                    {!! Form::text('firstname',null,['class'=>'form-control','required'=>'true']) !!}
                </div>
                <div class = "col-md-4 col-xs-6">
                    {!! Form::label('lastname', 'Lastname' )!!}
                    {!! Form::text('lastname',null,['class'=>'form-control','required'=>'true']) !!}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class = "col-md-8 col-xm-1 col-md-offset-1">
                    {!! Form::label('address', 'Address') !!}
                    {!! Form::text('address',null,['class'=>'form-control','required'=>'true']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class = "col-md-2 col-xs-4  col-md-offset-1  ">
                    {!! Form::label('gender', 'Gender') !!}
                    {!! Form::select('gender',['Male'=>'Male','Female'=>'Female'],null,['class'=>'form-control','required'=>'true']) !!}
                </div>
                <div class = "col-md-3 col-xs-4">
                    {!! Form::label('birthdate', 'Birth Date') !!}
                    {!! Form::date('birthdate',null,['class'=>'form-control','required'=>'true']) !!}
                </div>
                <div class = "col-md-3 col-xs-4  ">
                    {!! Form::label('contact', 'Contact') !!}
                    {!! Form::text('contact',null,['class'=>'form-control','required'=>'true']) !!}
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group">
                <div class = "col-md-4 col-xs-6 col-md-offset-1">

                {!! Form::label('department_id', 'Department') !!}
                    {!! Form::select('department_id',$department_lists,null,['class'=>'form-control','required'=>'true','placeholder'=>'Select Department']) !!}
                </div>
                <div class = "col-md-4 col-xs-6">
                    {!! Form::label('designation', 'Designation') !!}
                    {!! Form::text('designation',null,['class'=>'form-control','required'=>'true']) !!}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class = "col-md-4 col-xs-6 col-md-offset-1">

                    {!! Form::label('date_hired', 'Date Hired') !!}
                    {!! Form::date('date_hired',null,['class'=>'form-control','required'=>'true']) !!}
                </div>
                <div class = "col-md-4 col-xs-6">
                    {!! Form::label('date_left', 'Date Left') !!}
                    {!! Form::date('date_left',null,['class'=>'form-control']) !!}

                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group">
                <div class = "col-md-8 col-md-offset-1">
                    {!! Form::label('user_photo', 'Upload Image') !!}
                    {!! Form::file('user_photo') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class = "col-md-4 col-md-offset-1">
                    {!! Form::label('old_password', 'Current Password') !!}
                    {!! Form::password('old_password',['class'=>'form-control','required'=>'true']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class = "col-md-4 col-xm-1 col-md-offset-1">
                    {!! Form::label('password', 'Password' ) !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class = "col-md-4 col-xm-1 col-md-offset-1">
                    {!! Form::label('password_confirmation', 'Confirm Password') !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                </div>
            </div>
        </div>

        <hr>

</font>
    </tt>
        {!! Form::close() !!}
    </div>





