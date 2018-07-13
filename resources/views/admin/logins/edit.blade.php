@extends('layouts.admin.admin',['page_header' => 'Modify Login'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header" style=background-color:powderblue>

                </div>
                <div class="box-body">
                    {!! Form::model($login,['method'=>'PATCH','url' => '/logins/'.$login->id]) !!}
                    @include('admin.logins.form',['buttonlabel'=>'Update Login'])
                </div>
                <div class="box-footer" style=background-color:powderblue>

                </div>
            </div>
        </div>
    </div>





@endsection
