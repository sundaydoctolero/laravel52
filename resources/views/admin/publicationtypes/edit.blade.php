@extends('layouts.admin.admin',['page_header' => 'Modify Publication Type'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($publicationtype,['method'=>'PATCH','url' => '/publicationtypes/'.$publicationtype->id]) !!}
                    @include('admin.publicationtypes.form',['buttonlabel'=>'Update Publication Type'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
