    {{ csrf_field() }}

    {!! Form::label('item_no', 'Item No.') !!}
    {!! Form::text('item_no',null,['class'=>'form-control']) !!}

    {!! Form::label('quantity', 'Quantity') !!}
    {!! Form::text('quantity',null,['class'=>'form-control']) !!}


    {!! Form::label('item_name', 'Item Name') !!}
    {!! Form::text('item_name',null,['class'=>'form-control']) !!}

    {!! Form::label('item_brand', 'Item Brand') !!}
    {!! Form::text('item_brand',null,['class'=>'form-control']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description',null,['class'=>'form-control']) !!}

    {!! Form::label('serial_no', 'Serial No.') !!}
    {!! Form::text('serial_no',null,['class'=>'form-control']) !!}

    <label>Status
        <input list="status_list" name="status" class="form-control" placeholder="Please Specify" /></label>
    <datalist id="status_list">
        <option value="Working">
        <option value="Defective">
    </datalist>

    {!! Form::label('remarks', 'Remarks') !!}
    {!! Form::text('remarks',null,['class'=>'form-control']) !!}

    <hr>

    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}
    {!! Form::close() !!}



