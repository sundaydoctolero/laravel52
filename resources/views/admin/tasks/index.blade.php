@extends('layouts.admin.admin',['page_header' => 'Tasks'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/tasks/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Record</button></a></h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
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
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->user['name'] }}</td>
                        <td>{{ $task->task_name }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->comments }}</td>
                        <td>{{ $task->admin['name'] }}</td>
                        <td>{{ $task->completion_date }}</td>
                        <td>{{ $task->created_at->diffforHumans() }}</td>
                        <td>
                            <a href="tasks/{{ $task->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
