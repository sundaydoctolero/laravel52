@extends('layouts.admin.admin',['page_header' => 'Modify Publication'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($publication,['method'=>'PATCH','url' => '/publications/'.$publication->id]) !!}
                    @include('admin.publications.form',['buttonlabel'=>'Update Publication'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
