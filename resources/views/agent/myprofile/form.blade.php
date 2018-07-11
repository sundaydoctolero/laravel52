    {{ csrf_field() }}

    <div class = "container" >
    <tt>
        <div class = "form-group">
             <div class = "row">

             </div>
                <div class = "row">
                    <div class = "col-md-8 col-md-offset-1">

                    </div>
                </div>



            <div class = "row">
                     {!! Form::label('name', 'Display Name',['class' => 'col-md-2 col-xm-1 col-xs-6 col-md-offset-1'] ) !!}
                     {!! Form::label('username', 'Username', ['class' => 'col-md-1 col-xm-1 col-xs-6'] ) !!}
                     {!! Form::label('email', 'Email', ['class' => 'col-md-1 col-xm-1 col-xs-6 col-md-offset-2']) !!}
            </div>
                <div class = "row">
                    <div class = "col-md-2 col-xm-1 col-xs-4 col-md-offset-1">
                        {!! Form::text('name',auth()->user()->name,['class'=>'form-control','require'=>'true']) !!}                    </div>
                        <div class = "col-md-3 col-xm-1 col-xs-6">
                             {!! Form::text('username',auth()->user()->username,['class'=>'form-control','required'=>'true']) !!}
                         </div>
                            <div class = "col-md-3 col-xm-1 col-xs-6 ">
                                 {!! Form::text('email',auth()->user()->email,['class'=>'form-control','required'=>'true']) !!}

                             </div>

                </div>





            <div class = "row">
                {!! Form::label('firstname', 'Firstname', ['class' => 'col-md-1 col-xm-1 col-xs-6 col-md-offset-1']) !!}
                {!! Form::label('lastname', 'Lastname', ['class' => 'col-md-1 col-xm-1 col-xs-6 col-md-offset-3'])!!}
            </div>
                <div class = "row">
                    <div class = "col-md-4 col-xm-1 col-xs-6 col-md-offset-1">
                    {!! Form::text('firstname',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                    <div class = "col-md-4 col-xm-1 col-xs-6">
                        {!! Form::text('lastname',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>




            <div class = "row">
                {!! Form::label('address', 'Address', ['class' => 'col-md-1 col-xm-1 col-xs-6 col-md-offset-1']) !!}
            </div>
            <div class = "row">
                <div class = "col-md-8 col-xm-1 col-md-offset-1">
                    {!! Form::text('address',null,['class'=>'form-control','required'=>'true']) !!}
                </div>
            </div>




            <div class = "row">
                {!! Form::label('gender', 'Gender' ,['class' => 'col-md-1  col-xm-1 col-xs-4  col-md-offset-1']) !!}
                {!! Form::label('birthdate', 'Birth Date', ['class' => 'col-md-2 col-xm-1 col-xs-4  col-md-offset-1']) !!}
                {!! Form::label('contact', 'Contact', ['class' => 'col-md-1  col-xm-1 col-xs-4  col-md-offset-1']) !!}

            </div>
            <div class = "row">

                    <div class = "col-md-2 col-xm-1 col-xs-4  col-md-offset-1  ">
                    {!! Form::select('gender',['Male'=>'Male','Female'=>'Female'],null,['class'=>'form-control','required'=>'true']) !!}
                </div>
                <div class = "col-md-3 col-xm-1 col-xs-4 ">
                    {!! Form::date('birthdate',null,['class'=>'form-control','required'=>'true']) !!}
                </div>

                <div class = "col-md-3 col-xm-1 col-xs-4 ">
                    {!! Form::text('contact',null,['class'=>'form-control','required'=>'true']) !!}
                </div>


            </div>


            <hr>
            <div class = "row">
                {!! Form::label('department_id', 'Department', ['class' => 'col-md-1 col-md-offset-1']) !!}
                {!! Form::label('designation', 'Designation', ['class' => 'col-md-1 col-md-offset-3']) !!}
            </div>
            <div class = "row">
                <div class = "col-md-4 col-xm-1 col-xs-6 col-md-offset-1">
                    {!! Form::select('department_id',$department_lists,null,['class'=>'form-control','required'=>'true','placeholder'=>'Select Department']) !!}
                </div>
                <div class = "col-md-4 col-xm-1 col-xs-6 ">

                    {!! Form::text('designation',null,['class'=>'form-control','required'=>'true']) !!}
                </div>
            </div>


            <div class = "row">
                {!! Form::label('date_hired', 'Date Hired', ['class' => 'col-md-2 col-xm-1 col-xs-6  col-md-offset-1']) !!}
                {!! Form::label('date_left', 'Date Left', ['class' => 'col-md-2 col-xm-1 col-xs-6 col-md-offset-2']) !!}
            </div>
            <div class = "row">
                <div class = "col-md-4 col-xm-1 col-xs-6  col-md-offset-1">
                    {!! Form::date('date_hired',null,['class'=>'form-control','required'=>'true']) !!}
                </div>
                <div class = "col-md-4 col-xm-1 col-xs-6">

                    {!! Form::date('date_left',null,['class'=>'form-control']) !!}
                </div>
            </div>







            <hr>
            <div class = "row">
                {!! Form::label('user_photo', 'Upload Image', ['class' => 'col-md-2 col-md-offset-1']) !!}
            </div>
            <div class = "row">
                 <div class = "col-md-1 col-md-offset-1">
                    {!! Form::file('user_photo') !!}
                 </div>
            </div>




            <div class = "row">
                {!! Form::label('old_password', 'Current Password',['class' => 'col-md-2 col-md-offset-1'] ) !!}
            </div>
            <div class = "row">
                <div class = "col-md-4 col-md-offset-1">
                    {!! Form::password('old_password',['class'=>'form-control','required'=>'true']) !!}
                </div>
            </div>



            <div class = "row">
                {!! Form::label('password', 'Password',['class' => 'col-md-2 col-xm-1 col-xs-6  col-md-offset-1'] ) !!}
            </div>
            <div class = "row">
                <div class = "col-md-4 col-xm-1 col-md-offset-1">
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>
            </div>



            <div class = "row">
                {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-md-2 col-xm-1 col-xs-12 col-md-offset-1']) !!}
            </div>
            <div class = "row">
                <div class = "col-md-4 col-xm-1 col-md-offset-1">
                    {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                </div>
            </div>


            <hr>
              {!! Form::submit($buttonlabel,['class'=>'btn btn-primary col-md-3 col-md-offset-6']) !!}
    {!! Form::close() !!}

        </div>
        </tt>
    </div>




