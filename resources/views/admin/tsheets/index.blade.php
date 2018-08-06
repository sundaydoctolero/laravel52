@extends('layouts.admin.admin',['logo' => 'fa fa-pencil','page_header' => 'Create Tsheet'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/tsheets/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Tsheet</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
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
                        </thead>
                        <tbody>
                        @foreach($agent_tsheets as $i => $tsheet)
                            <tr>
                                <td>{{ $i++ + 1 }}</td>
                                <td>{{ $tsheet->user['name'] }}</td>
                                <td>{{ $tsheet->job_number->job_number_id }}</td>
                                <td>{{ $tsheet->job_number->job_number_description }}</td>
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
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
