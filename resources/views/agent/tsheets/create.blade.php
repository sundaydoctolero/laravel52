@extends('layouts.app.app',['page_header' => 'Add New Tsheet'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/agent/tsheets/create','class'=>'inline']) !!}
                        @include('agent.tsheets.form',['buttonlabel' => 'Add Tsheet'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
