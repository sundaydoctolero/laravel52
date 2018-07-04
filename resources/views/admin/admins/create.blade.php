@extends('layouts.admin.admin',['page_header' => 'Add Admin User'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        @include('errors.error')
                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/admins/create','enctype'=>'multipart/form-data']) !!}
                        @include('admin.admins.form',['buttonlabel' => 'Add Admin'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
