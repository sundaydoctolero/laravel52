@extends('layouts.admin.admin',['page_header' => 'Modify Reports'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <div class="col-md-offset-1">
                        <h1><b>{{ $download->publication->publication_name.' | '.$download->publication_date }}</b></h1>
                    </div>
                </div>
                <div class="box-body col-md-offset-1">
                    <h3><a href="{{ $download->publication->website }}">{{ $download->publication->website }}</a></h3>
                    <h3>Username: {{ $download->publication->username }}</h3>
                    <h3>Password: {{ $download->publication->password }}</h3>
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="box box-solid box-primary">
        <div class="row">
            <div class="col-xs-12">
                <div class="box-header"></div>
                <div class="box-body">
                    {!! Form::model($download,['method'=>'PATCH','url' => '/newspaper_reports/'.$download->id]) !!}
                    @include('admin.downloads.form',['buttonlabel'=>'Update Reports'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
