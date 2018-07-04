@extends('layouts.admin.admin',['page_header' => 'Add New Employee'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/employees/create']) !!}
                        @include('admin.employees.form',['buttonlabel' => 'Add Employee'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
