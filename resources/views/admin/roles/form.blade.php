    {{ csrf_field() }}
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('display_name', 'Display Name') !!}
    {!! Form::text('display_name',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description',null,['class'=>'form-control','required'=>'true']) !!}

    <div class="form-group">
        {!! Form::label('permission', 'Permission') !!}
        {!! Form::select('permission_list[]', $permission_lists, null, ['class'=>'form-control','required'=>'true','id'=>'permission_list','multiple'=>'true']) !!}
    </div>

    <hr>

    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

