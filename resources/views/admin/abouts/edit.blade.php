@extends('layouts.admin.admin',['page_header' => 'Update About'])

@section('main-content')
    <div class="row">
        <div class = "col-xs-12">
            <div class = "box">
                <div class = "box-header">
                </div>
                <div class ="box-body">
                    {!! Form::Model($about,['method'=>'PATCH','url' => '/abouts/'.$about->id.'/update']) !!}
                    @include('admin.abouts.form',['buttonlabel'=>'Update About'] )

                </div>

                <div class = "box-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
