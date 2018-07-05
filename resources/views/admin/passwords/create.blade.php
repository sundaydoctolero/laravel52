@extends('layouts.admin.admin',['page_header' => 'Add Password'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/passwords/create']) !!}
                        @include('admin.passwords.form',['buttonlabel' => 'Save'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
