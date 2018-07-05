@extends('layouts.app.app',['page_header' => 'Modify User'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @include('errors.error')
                </div>
                <div class="box-body">
                    {!! Form::model($employee,['method'=>'PATCH','url' => '/myprofile/'.$employee->id,'enctype'=>'multipart/form-data']) !!}
                    @include('agent.myprofile.form',['buttonlabel'=>'Update User'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>

@endsection
