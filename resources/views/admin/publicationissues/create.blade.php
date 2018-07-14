@extends('layouts.admin.admin',['page_header' => 'Add New Publication Issue'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/publicationissues/create']) !!}
                        @include('admin.publicationissues.form',['buttonlabel' => 'Add Publication Issue'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
