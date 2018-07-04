@extends('layouts.admin.admin',['page_header' => 'Modify Department'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($department,['method'=>'PATCH','url' => '/departments/'.$department->id]) !!}
                    @include('admin.departments.form',['buttonlabel'=>'Update Department'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
