@extends('layouts.admin.admin',['page_header' => 'Add New Role'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/roles/create']) !!}
                        @include('admin.roles.form',['buttonlabel' => 'Add Role'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
