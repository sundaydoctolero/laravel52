@extends('layouts.admin.admin',['page_header' => '', 'logo'=>''])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($task,['method'=>'PATCH','url' => '/tasks/'.$task->id]) !!}
                    <div class = "col-md-offset-1">
                        <font size = "16"  face = "microsoft sans serif"> <h1 class = "fa fa-edit">&nbsp<tt>Modify Task</tt></h1></font>
                    </div>
                    <hr>
                    @include('admin.tasks.form',['buttonlabel'=>'Update Task'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
