@extends('layouts.admin.admin',['page_header' => '', 'logo'=>''])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header" style=background-color:powderblue>
                    @include('errors.error')
                </div>
                <div class="box-body" style=background-color:ghostwhite>
                    {!! Form::model($exception,['method'=>'PATCH','url' => '/exceptions/'.$exception->id,'enctype'=>'multipart/form-data']) !!}
                    <div class = "col-md-offset-1">
                        <font size = "16" face = "microsoft sans serif"> <h1 class = "fa fa-edit">&nbsp<tt>Modify Exception</tt></h1></font>
                    </div>
                    <hr style="height:2px; border:none; color:#000; background-color:#282B2E;">
                    @include('admin.exceptions.form',['buttonlabel'=>'Update Exception'])
                </div>
                <div class="box-footer" style=background-color:powderblue>

                </div>
            </div>
        </div>
    </div>





@endsection
