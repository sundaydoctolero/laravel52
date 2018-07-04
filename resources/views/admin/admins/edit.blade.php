@extends('layouts.admin.admin',['page_header' => 'Modify Admin User'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @include('errors.error')
                </div>
                <div class="box-body">
                    {!! Form::model($admin,['method'=>'PATCH','url' => '/admins/'.$admin->id,'enctype'=>'multipart/form-data']) !!}
                    @include('admin.admins.form',['buttonlabel'=>'Update Admin User'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
