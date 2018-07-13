@extends('layouts.app.app',['page_header' => 'Modify Downloads'])

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
                    {!! Form::model($download,['method'=>'PATCH','url' => '/agent/downloads/'.$download->id]) !!}
                    @include('agent.downloads.form',['buttonlabel'=>'Update Download'])
                </div>
                <div class="box-footer"></div>
            </div>
        </div>
    </div>






@endsection
