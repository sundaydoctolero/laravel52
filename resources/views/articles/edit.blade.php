@extends('layouts.admin.admin',['page_header' => 'Modify An Article'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($article,['method'=>'PATCH','url' => '/articles/'.$article->id]) !!}
                    @include('articles.form',['buttonlabel'=>'Update Article'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
