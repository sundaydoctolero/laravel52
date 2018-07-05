@extends('layouts.admin.admin',['page_header' => 'Modify Permission'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($permission,['method'=>'PATCH','url' => '/permissions/'.$permission->id]) !!}
                    @include('admin.permissions.form',['buttonlabel'=>'Update Permission'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
