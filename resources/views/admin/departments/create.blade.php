@extends('layouts.admin.admin',['page_header' => 'Add New Departments'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/departments/create']) !!}
                        @include('admin.departments.form',['buttonlabel' => 'Add Department'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
