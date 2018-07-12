    {{ csrf_field() }}

    <div class = "container" >
        <tt>
            <font face = "microsoft sans serif">
                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-3 col-xs-6 col-md-offset-3">
                            {!! Form::label('item_no', 'Item No.') !!}
                            {!! Form::text('item_no',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                        <div class = "col-md-3 col-xs-6">
                            {!! Form::label('quantity', 'Quantity') !!}
                            {!! Form::text('quantity',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('item_name', 'Item Name') !!}
                            {!! Form::text('item_name',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <div class = "col-md-6 col-md-offset-3">
                            {!! Form::label('item_brand', 'Item Brand') !!}
                            {!! Form::text('item_brand',null,['class'=>'form-control','required'=>'true']) !!}
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
                            {!! Form::label('serial_no', 'Serial No.') !!}
                            {!! Form::text('serial_no',null,['class'=>'form-control','required'=>'true']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                            <label class = "col-md-3 col-xs-6 col-md-offset-3">Status
                                <input list="status_list" name="status" class="form-control" placeholder="Please Specify" /></label>
                            <datalist id="status_list"  >
                                <option value="Working">
                                <option value="Defective">
                            </datalist>
                        <div class = "col-md-3 col-xs-6">

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
