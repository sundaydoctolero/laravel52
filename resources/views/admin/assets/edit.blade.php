@extends('layouts.admin.admin',['page_header' => 'Modify Asset'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @include('errors.error')
                </div>
                <div class="box-body">
                    {!! Form::model($asset,['method'=>'PATCH','url' => '/assets/'.$asset->id,'enctype'=>'multipart/form-data']) !!}
                    @include('admin.assets.form',['buttonlabel'=>'Update Menu'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
