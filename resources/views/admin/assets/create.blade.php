@extends('layouts.admin.admin',['logo'=>'','page_header' => ''])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        @include('errors.error')
                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/assets/create','enctype'=>'multipart/form-data']) !!}
                        <div class = "col-md-offset-1">
                            <font size = "16" face = "microsoft sans serif"> <h1 class = "fa fa-plus-circle">&nbsp<tt>Add Asset</tt></h1></font>
                        </div>
                        <hr>

                        @include('admin.assets.form',['buttonlabel' => 'Add Asset'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
