@extends('layouts.admin.admin',['logo'=>'fa fa-tasks','page_header' => 'Tasks'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/tasks/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
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
