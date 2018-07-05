    {{ csrf_field() }}

    {!! Form::label('rack_id', 'Rack ID') !!}
    {!! Form::text('rack_id',null,['class'=>'form-control']) !!}

    {!! Form::label('ip_address', 'IP Address') !!}
    {!! Form::text('ip_address',null,['class'=>'form-control']) !!}

    {!! Form::label('workstation_id', 'Workstation ID') !!}
    {!! Form::text('workstation_id',null,['class'=>'form-control']) !!}

    {!! Form::label('table', 'Table') !!}
    {!! Form::text('table',null,['class'=>'form-control']) !!}

    {!! Form::label('location', 'Location') !!}
    {!! Form::text('location',null,['class'=>'form-control']) !!}

    {!! Form::label('operator', 'Operator') !!}
    {!! Form::text('operator',null,['class'=>'form-control']) !!}

    {!! Form::label('comp_name', 'Comp Name') !!}
    {!! Form::text('comp_name',null,['class'=>'form-control']) !!}

    {!! Form::label('mac_address', 'Mac Address') !!}
    {!! Form::text('mac_address',null,['class'=>'form-control']) !!}

    <hr>
    {!! Form::submit($buttonlabel,['class'=>'btn btn-primary form-control']) !!}

    {!! Form::close() !!}

    @include('errors.error')

