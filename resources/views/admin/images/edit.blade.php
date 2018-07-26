@extends('layouts.admin.admin',['page_header' => 'Modify Listing Types'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($images,['method'=>'PATCH','url' => '/site_images/'.$images->id]) !!}
                    @include('admin.images.form',['buttonlabel'=>'Update'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
