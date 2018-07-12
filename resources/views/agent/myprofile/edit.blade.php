@extends('layouts.app.app',['page_header' => 'Modify User'])

@section('main-content')
    <hr>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @include('errors.error')
                </div>
                <div class="box-body">
                    {!!
                   Form::model($employee,['method'=>'PATCH','url' => '/myprofile/'.$employee->id,'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}

                    <div class = "col-md-offset-1">

                   <font face = "microsoft sans serif" size = "16"> <h1 class = "fa fa-user-circle-o"><tt>&nbspProfile</tt></h1></font>

                    </div>
                    <hr>
                    <br>
                    @include('agent.myprofile.form',['buttonlabel'=>'Update Information'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>

@endsection
