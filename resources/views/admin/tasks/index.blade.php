@extends('layouts.admin.admin',['logo'=>'fa fa-tasks','page_header' => 'Tasks'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    {!! Form::open(['url' => '/tasks','class' => 'form-inline', 'method' => 'GET']) !!}

                    <div class="form-group">
                        <h3 class="box-title"><a href="/tasks/create" class="btn btn-success"><i class="fa fa-plus"></i> Add New Task</a></h3>
                    </div>

                    <div class="pull-right">
                        <div class="form-group">
                            {!! Form::label('user_id', 'User :') !!}
                            {!! Form::select('user_id',\App\User::lists('name','id'),null,['class'=>'form-control','placeholder'=>'--']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status :') !!}
                            {!! Form::select('status',['Open'=>'Open','Pending'=>'Pending','Closed'=>'Closed'],null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date_from', 'Date From :') !!}
                            {!! Form::date('date_from',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date_to', 'To :') !!}
                            {!! Form::date('date_to',\Carbon\Carbon::now(),['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Filter Task',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee Name</th>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Comments</th>
                            <th>Check By</th>
                            <th>Completion Date</th>
                            <th>Created Since</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->user['name'] }}</td>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->description }}</td>
                                <td><span class="badge bg-{{ status_color($task->status) }}">{{ $task->status }}</span></td>
                                <td>{{ $task->comments }}</td>
                                <td>{{ $task->admin['name'] }}</td>
                                <td>{{ $task->completion_date }}</td>
                                <td>{{ $task->created_at->diffforHumans() }}</td>
                                <td>
                                    <a href="tasks/{{ $task->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $.extend( true, $.fn.dataTable.defaults, {
        "order": [[ 4, "desc" ]]
    } );
</script>
@endpush
