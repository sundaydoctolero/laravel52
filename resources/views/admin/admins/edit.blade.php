@extends('layouts.admin.admin',['page_header' => '', 'logo'=>''])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @include('errors.error')
                </div>
                <div class="box-body">
                    {!! Form::model($admin,['method'=>'PATCH','url' => '/admins/'.$admin->id,'enctype'=>'multipart/form-data']) !!}
                    <div class = "col-md-offset-1">
                        <font size = "16" face = "microsoft sans serif"> <h1 class = "fa fa-edit">&nbsp<tt>Modify Admin User</tt></h1></font>
                    </div>
                    <hr>
                    @include('admin.admins.form',['buttonlabel'=>'Update Admin User'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
