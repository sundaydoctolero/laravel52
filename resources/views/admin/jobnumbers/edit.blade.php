@extends('layouts.admin.admin',['page_header' => 'Modify Job Number'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($jobnumber,['method'=>'PATCH','url' => '/jobnumbers/'.$jobnumber->id]) !!}
                    @include('admin.jobnumbers.form',['buttonlabel'=>'Update Job Number'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
