@extends('layouts.admin.admin',['page_header' => 'Modify Menu'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @include('errors.error')
                </div>
                <div class="box-body">
                    {!! Form::model($menu,['method'=>'PATCH','url' => '/menus/'.$menu->id,'enctype'=>'multipart/form-data']) !!}
                    @include('admin.menus.form',['buttonlabel'=>'Update Menu'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
