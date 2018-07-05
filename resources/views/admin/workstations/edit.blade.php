@extends('layouts.admin.admin',['page_header' => 'Modify Workstation'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($workstation,['method'=>'PATCH','url' => '/workstations/'.$workstation->id]) !!}
                    @include('admin.workstations.form',['buttonlabel'=>'Update Workstation'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
