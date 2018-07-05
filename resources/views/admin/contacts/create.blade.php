@extends('layouts.admin.admin',['page_header' => 'Add New Contact'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/contacts/create']) !!}
                        @include('admin.contacts.form',['buttonlabel' => 'Add Contact'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
