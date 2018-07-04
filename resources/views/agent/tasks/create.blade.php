@extends('layouts.app.app',['page_header' => 'Add New Task'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/agent/tasks/create']) !!}
                        @include('agent.tasks.form',['buttonlabel' => 'Add Task'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
