@extends('layouts.admin.admin',['page_header' => 'Add New State'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/states/create']) !!}
                        @include('admin.states.form',['buttonlabel' => 'Add State'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
