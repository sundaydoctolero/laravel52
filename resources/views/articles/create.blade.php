@extends('layouts.admin.admin',['page_header' => 'Write An Article'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/articles/create']) !!}
                        @include('articles.form',['buttonlabel' => 'Add Article'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
