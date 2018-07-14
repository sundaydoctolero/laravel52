@extends('layouts.admin.admin',['page_header' => 'Modify Publication Issue'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($publicationissue,['method'=>'PATCH','url' => '/publicationissues/'.$publicationissue->id]) !!}
                    @include('admin.publicationissues.form',['buttonlabel'=>'Update Publication Issue'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
