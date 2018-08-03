@extends('layouts.admin.admin',['page_header' => 'Modify Downloads'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <div class="col-md-offset-1">
                        <h1><b>{{ $download->publication->publication_name.' | '.$download->publication_date.' | '
                                    .$download->publication->publication_code }}</b></h1>
                    </div>
                </div>
                <div class="box-body col-md-offset-1">
                    {!! Form::model($download,['method'=>'PATCH','url' => '/downloads/'.$download->id]) !!}
                    @include('admin.downloads.form',['buttonlabel'=>'Update Download'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
