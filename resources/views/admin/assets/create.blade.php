@extends('layouts.admin.admin',['page_header' => 'Add Asset'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        @include('errors.error')
                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/assets/create','enctype'=>'multipart/form-data']) !!}
                        @include('admin.assets.form',['buttonlabel' => 'Add Asset'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
