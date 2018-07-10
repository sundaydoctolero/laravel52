    {{ csrf_field() }}

    <div class="form-group">
        {!! Form::label('state_lists', 'State') !!}
        {!! Form::select('state_list[]', $state_lists, null, ['class'=>'form-control','required'=>'true','id'=>'state_list','multiple'=>'true']) !!}
    </div>

    {!! Form::label('publication_name', 'Publication Name') !!}
    {!! Form::text('publication_name',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('website', 'Website URL') !!}
    {!! Form::text('website',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('issue', 'Issue') !!}
    {!! Form::select('issue',$pub_issues,null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('day_due_out', 'Day Due Out') !!}
    {!! Form::text('day_due_out',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username',null,['class'=>'form-control','required'=>'true']) !!}

    {!! Form::label('password', 'Password') !!}
    {!! Form::text('password',null,['class'=>'form-control','required'=>'true']) !!}



    {!! Form::label('publication_type', 'Type Of Publication') !!}
    {!! Form::select('publication_type',$pub_types,null,['class'=>'form-control','required'=>'true']) !!}


    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

