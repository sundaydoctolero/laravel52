@extends('layouts.admin.admin',['page_header' => 'Add New Task'])

@section('main-content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <div class="box-body">
                        {!! Form::open(['url' => '/tasks/create']) !!}
                        {!! Form::label('user_id', 'Employee') !!}
                        {!! Form::select('user_id',$user_lists,null,['class'=>'form-control']) !!}

                        @include('admin.tasks.form',['buttonlabel' => 'Add Task'])
                    </div>
                    <div class="box-footer">

                    </div>
                </div>
            </div>
        </div>
@endsection
