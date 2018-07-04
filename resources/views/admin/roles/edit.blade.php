@extends('layouts.admin.admin',['page_header' => 'Modify Role'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($role,['method'=>'PATCH','url' => '/roles/'.$role->id]) !!}
                    @include('admin.roles.form',['buttonlabel'=>'Update Task'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
