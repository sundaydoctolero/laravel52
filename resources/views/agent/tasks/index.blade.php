@extends('layouts.app.app',['page_header' => 'Tasks Create'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/agent/tasks/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Record</button></a></h3>

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
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Comments</th>
                        <th>Check By</th>
                        <th>Completion Date</th>
                        <th>Created Since</th>
                        <th>Action</th>
                    </tr>
                    @foreach($results as $result)
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->task_name }}</td>
                        <td>{{ $result->description }}</td>
                        <td>{{ $result->status }}</td>
                        <td>{{ $result->comments }}</td>
                        <td>{{ $result->admin['name'] }}</td>
                        <td>{{ $result->completion_date }}</td>
                        <td>{{ $result->created_at->diffforHumans() }}</td>
                        <td>
                            <a href="/agent/tasks/{{ $result->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
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
