@extends('layouts.admin.admin',['page_header' => 'Add New Workstation'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/workstations/create']) !!}
                        @include('admin.workstations.form',['buttonlabel' => 'Add Workstation'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
