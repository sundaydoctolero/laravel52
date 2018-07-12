    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-5 col-md-offset-1">
                            {!! Form::label('firstname', 'Firstname') !!}
                            {!! Form::text('firstname',null,['class'=>'form-control','required'=>'true']) !!}

                         </div>
                        <div class = "col-md-5">
                            {!! Form::label('lastname', 'Lastname') !!}
                            {!! Form::text('lastname',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>



    <div class="row">
        <div class="form-group">
            <div class = "col-md-2 col-md-offset-1">
                {!! Form::label('gender', 'Gender') !!}
                {!! Form::select('gender',['Male'=>'Male','Female'=>'Female'],null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class = "col-md-4">
                {!! Form::label('birthdate', 'Birth Date') !!}
                {!! Form::date('birthdate',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
            <div class = "col-md-4">
                {!! Form::label('contact', 'Contact') !!}
                {!! Form::text('contact',null,['class'=>'form-control','required'=>'true']) !!}
            </div>
        </div>
    </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-10 col-md-offset-1">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address',null,['class'=>'form-control','required'=>'true']) !!}                        </div>
                    </div>
                </div>



                <div class="row">
        <div class="form-group">
            <div class="col-md-3">
            </div>

        </div>
    </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-5 col-md-offset-1">
                            {!! Form::label('department_id', 'Department') !!}
                            {!! Form::select('department_id',\App\Department::lists('dept_name','id'),null,['class'=>'form-control','required'=>'true','placeholder'=>'Select Department']) !!}
                        </div>
                        <div class = "col-md-5">
                            {!! Form::label('designation', 'Designation') !!}
                            {!! Form::text('designation',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-5 col-md-offset-1">
                            {!! Form::label('date_hired', 'Date Hired') !!}
                            {!! Form::date('date_hired',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                        <div class = "col-md-5">
                            {!! Form::label('date_left', 'Date Left') !!}
                            {!! Form::date('date_left',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
    <br>
                {!! Form::submit($buttonlabel,['class'=>'btn btn-primary col-md-3 col-md-offset-8']) !!}
    {!! Form::close() !!}
            </font>
        </tt>
    </div>

    @include('errors.error')

