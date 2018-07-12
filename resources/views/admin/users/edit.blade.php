@extends('layouts.admin.admin',['page_header' => '', 'logo'=>''])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @include('errors.error')
                </div>
                <div class="box-body">
                    {!! Form::model($user,['method'=>'PATCH','url' => '/users/'.$user->id,'enctype'=>'multipart/form-data']) !!}
                    <div class = "col-md-offset-1">
                        <font size = "16" face = "microsoft sans serif"> <h1 class = "fa fa-edit">&nbsp<tt>Modify User</tt></h1></font>
                    </div>
                    <hr>
                    @include('admin.users.form',['buttonlabel'=>'Update User'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
