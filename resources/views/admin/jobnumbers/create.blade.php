@extends('layouts.admin.admin',['page_header' => 'Add New Job Numbers'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/jobnumbers/create']) !!}
                        @include('admin.jobnumbers.form',['buttonlabel' => 'Add Job Number'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
