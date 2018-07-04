@extends('layouts.admin.admin',['page_header' => $article->title])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <h1>{{ $article->title }}</h1>
                    <p>{{ $article->body }}</p>
                    <p>{{ $article->date_created }}</p>
                    <a href="/articles"><button class="form-control">Back</button></a>
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
