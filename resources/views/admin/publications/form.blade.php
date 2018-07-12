    {{ csrf_field() }}
    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                                {!! Form::label('state_lists', 'State') !!}
                                {!! Form::select('state_list[]', $state_lists, null, ['class'=>'form-control','required'=>'true','id'=>'state_list','multiple'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('publication_name', 'Publication Name') !!}
                            {!! Form::text('publication_name',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('website', 'Website URL') !!}
                            {!! Form::text('website',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('issue', 'Issue') !!}
                            {!! Form::select('issue',$pub_issues,null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('day_due_out', 'Day Due Out') !!}
                            {!! Form::text('day_due_out',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
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

                            {!! Form::label('password', 'Password') !!}
                            {!! Form::text('password',null,['class'=>'form-control','required'=>'true']) !!}
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('publication_type', 'Type Of Publication') !!}
                            {!! Form::select('publication_type',$pub_types,null,['class'=>'form-control','required'=>'true']) !!}
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

