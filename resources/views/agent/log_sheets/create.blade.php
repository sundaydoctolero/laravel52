@extends('layouts.app.app',['page_header' => 'Add Log-Sheet'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/agent/entries/create']) !!}
                            @include('agent.log_sheets.form',['buttonlabel' => 'Add Log-Sheet'])
                        {!! Form::close() !!}
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
