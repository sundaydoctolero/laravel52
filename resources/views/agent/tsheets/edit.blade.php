@extends('layouts.app.app',['page_header' => 'Modify Tsheet'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($tsheet,['method'=>'PATCH','url' => '/agent/tsheets/'.$tsheet->id]) !!}
                    @include('agent.tsheets.form',['buttonlabel'=>'Update Tsheet'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
