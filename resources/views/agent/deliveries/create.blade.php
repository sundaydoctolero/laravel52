@extends('layouts.app.app',['page_header' => 'Add Output'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/agent/outputs/create']) !!}

                        @include('agent.outputs.form',['buttonlabel' => 'Add Output'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
