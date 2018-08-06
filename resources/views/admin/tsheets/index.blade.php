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
                            <th class="text-center">Job Number</th>
                            <th>Description</th>
                            <th class="text-center">Start Time</th>
                            <th class="text-center">End Time</th>
                            <th class="text-center">Total Hours</th>
                            <th class="text-right">Total Records</th>
                            <th>Remarks</th>
                            <th class="text-center">Action</th>
                            <th class="text-right">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agent_tsheets as $i => $tsheet)
                            <tr>
                                <td>{{ $i++ + 1 }}</td>
                                <td>{{ $tsheet->user['name'] }}</td>
                                <td class="text-center">{{ $tsheet->job_number->job_number_id }}</td>
                                <td>{{ $tsheet->job_number->job_number_description }}</td>
                                <td class="text-center">{{ $tsheet->start_time }}</td>
                                <td class="text-center">{{ $tsheet->end_time }}</td>
                                <td class="text-center">{{ $tsheet->total_hours }}</td>
                                <td class="text-right">{{ $tsheet->total_records}}</td>
                                <td>{{ $tsheet->remarks}}</td>
                                <td class="text-center">
                                    <a href="/tsheets/{{ $tsheet->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                                </td>
                                <td class="text-right">{{ $tsheet->created_at }}</td>
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
        "pageLength": 50,
        "order": [[ 10, "desc" ]],
    } );
</script>
@endpush
