@extends('layouts.admin.admin',['page_header' => 'Modify Password'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($password,['method'=>'PATCH','url' => '/passwords/'.$password->id]) !!}
                    @include('admin.passwords.form',['buttonlabel'=>'Update Password'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
