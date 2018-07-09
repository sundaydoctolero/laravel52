@extends('layouts.admin.admin',['page_header' => 'Modify State'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($state,['method'=>'PATCH','url' => '/states/'.$state->id]) !!}
                    @include('admin.states.form',['buttonlabel'=>'Update State'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
