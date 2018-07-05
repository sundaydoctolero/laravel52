@extends('layouts.admin.admin',['page_header' => 'Add New Backup'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/backups/create']) !!}
                        @include('admin.backups.form',['buttonlabel' => 'Add Backup'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
