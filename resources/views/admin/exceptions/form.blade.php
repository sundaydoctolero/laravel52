    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('user_id', 'Operator No') !!}
                            {!! Form::select('user_id',\App\User::lists('operator_no','id'),null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('exception_type', 'Exception Type') !!}
                            {!! Form::select('exception_type',$exception_list,null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-3 col-md-offset-3">
                            {!! Form::label('date_from', 'Date') !!}
                            {!! Form::date('date_from',null,['class'=>'form-control','required'=>'true']) !!}

                        </div>
                        <div class = "col-md-3" hidden="true">
                            {!! Form::label('date_to', 'Date To') !!}
                            {!! Form::date('date_to',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="row" hidden="true">
                    <div class="form-group">
                        <div class = "col-md-3 col-md-offset-3">
                            {!! Form::label('time_from', 'Time From') !!}
                            {!! Form::time('time_from',null,['class'=>'form-control']) !!}

                        </div>
                        <div class = "col-md-3">
                            {!! Form::label('time_to', 'Time To') !!}
                            {!! Form::time('time_to',null,['class'=>'form-control']) !!}

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::text('description',null,['class'=>'form-control','required'=>'true']) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('paid', 'Paid') !!}
                            <div class="form-control">
                                {!! Form::radio('paid',1, true) !!} Yes
                                {!! Form::radio('paid',0) !!} No
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status',$status,null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('approver_id', 'Approver Name') !!}
                            {!! Form::select('approver_id',$approver,null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('remarks', 'Remarks') !!}
                            {!! Form::text('remarks',null,['class'=>'form-control']) !!}
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


