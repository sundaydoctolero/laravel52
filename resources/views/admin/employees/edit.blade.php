@extends('layouts.admin.admin',['page_header' => 'Modify Employee'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($employee,['method'=>'PATCH','url' => '/employees/'.$employee->id]) !!}
                    @include('admin.employees.form',['buttonlabel'=>'Update Employee'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
