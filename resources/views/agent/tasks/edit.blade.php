@extends('layouts.app.app',['page_header' => 'Modify Task'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                </div>
                <div class="box-body">
                    {!! Form::model($task,['method'=>'PATCH','url' => '/agent/tasks/'.$task->id]) !!}
                    @include('agent.tasks.form',['buttonlabel'=>'Update Task'])
                </div>
                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>





@endsection
