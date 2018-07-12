@extends('layouts.admin.admin',['page_header' => '', 'logo' => ''])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($permission,['method'=>'PATCH','url' => '/permissions/'.$permission->id]) !!}
                    <div class = "col-md-offset-1">
                        <font size = "16" face = "microsoft sans serif"> <h1 class = "fa fa-edit">&nbsp<tt>Modify Permission</tt></h1></font>
                    </div>
                    <hr>
                    @include('admin.permissions.form',['buttonlabel'=>'Update Permission'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
