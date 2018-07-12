@extends('layouts.app.app',['page_header' => 'Tasks'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/agent/tasks/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
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
                        </thead>
                        <tbody>
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
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection







