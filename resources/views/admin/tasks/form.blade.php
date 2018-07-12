    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
            <div class="row">
                <div class="form-group">
                    <div class = "col-md-8 col-xm-1 col-md-offset-2">
                        {!! Form::label('task_name', 'Task Name') !!}
                        {!! Form::text('task_name',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="form-group">
                    <div class = "col-md-8 col-xm-1 col-md-offset-2">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::text('description',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class = "col-md-8 col-xm-1 col-md-offset-2">
                        {!! Form::label('status', 'Status') !!}
                        {!! Form::select('status',['Open'=>'Open','Pending'=>'Pending','Closed'=>'Closed'],null,['class'=>'form-control','required'=>'true']) !!}

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class = "col-md-8 col-xm-1 col-md-offset-2">
                        {!! Form::label('comments', 'Comments') !!}
                        {!! Form::textarea('comments',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class = "col-md-8 col-xm-1 col-md-offset-2">
                        {!! Form::label('completion_date', 'Completion Date') !!}
                        {!! Form::date('completion_date',null,['class'=>'form-control','required'=>'true']) !!}
                    </div>
                </div>
            </div>

    <br>
                {!! Form::submit($buttonlabel,['class'=>'btn btn-primary col-md-3 col-md-offset-7']) !!}

    {!! Form::close() !!}
            </font>

    </tt>
        </div>
    @include('errors.error')

