@extends('layouts.admin.admin',['page_header' => 'Modify Contact'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($contact,['method'=>'PATCH','url' => '/contacts/'.$contact->id]) !!}
                    @include('admin.contacts.form',['buttonlabel'=>'Update Contact'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
