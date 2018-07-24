@extends('layouts.app.app',['page_header' => 'Add Download'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/agent/downloads/create']) !!}
                        @include('agent.downloads.form',['buttonlabel' => 'Add Download'])
                    </div>
                       <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
