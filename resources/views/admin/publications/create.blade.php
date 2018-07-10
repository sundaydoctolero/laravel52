@extends('layouts.admin.admin',['page_header' => 'Add New Publication'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/publications/create']) !!}
                        @include('admin.publications.form',['buttonlabel' => 'Add Publication'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
