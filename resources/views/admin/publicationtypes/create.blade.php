@extends('layouts.admin.admin',['page_header' => 'Add New Publication Type'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/publicationtypes/create']) !!}
                        @include('admin.publicationtypes.form',['buttonlabel' => 'Add Publication Type'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
