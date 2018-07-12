    {{ csrf_field() }}
    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('user_name', 'User Name') !!}
                            {!! Form::text('user_name',null,['class'=>'form-control','required'=>'true']) !!}
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
                            {!! Form::label('product_key', 'Product Key') !!}
                            {!! Form::text('product_key',null,['class'=>'form-control','required'=>'true']) !!}
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
                            {!! Form::label('account_name', 'Account Name') !!}
                            {!! Form::text('account_name',null,['class'=>'form-control','required'=>'true']) !!}
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

