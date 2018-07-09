@extends('layouts.admin.admin',['page_header' => 'Create Tsheet'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/tsheets/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add Tsheet</button></a></h3>

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
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Employee Name</th>
                            <th>Job Number</th>
                            <th>Description</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Total Hours</th>
                            <th>Total Records</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                            @foreach($agent_tsheets as $i => $tsheet)
                            <tr>
                                <td>{{ $i++ + 1 }}</td>
                                <td>{{ $tsheet->user['name'] }}</td>
                                <td>{{ $tsheet->job_number['job_number_id'] }}</td>
                                <td>{{ $tsheet->job_number['job_number_description'] }}</td>
                                <td>{{ $tsheet->start_time }}</td>
                                <td>{{ $tsheet->end_time }}</td>
                                <td>{{ $tsheet->total_hours }}</td>
                                <td>{{ $tsheet->total_records}}</td>
                                <td>{{ $tsheet->remarks}}</td>
                                <td>
                                    <a href="/tsheets/{{ $tsheet->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
