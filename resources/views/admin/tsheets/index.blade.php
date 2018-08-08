@extends('layouts.admin.admin',['logo' => 'fa fa-pencil','page_header' => 'Tsheet'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    {!! Form::open(['url' => '/tsheets','class' => 'form-inline', 'method' => 'GET']) !!}
                    <div class="form-group">
                        <h3 class="box-title"><a href="/tsheets/create" class="btn btn-success"><i class="fa fa-plus"></i> Add New Tsheet</a></h3>
                    </div>

                    <div class="pull-right">
                        <div class="form-group">
                            {!! Form::label('user_id', 'User :') !!}
                            {!! Form::select('user_id',\App\User::lists('name','id'),null,['class'=>'form-control','placeholder'=>'--']) !!}
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
                            {!! Form::submit('Filter User',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Operator No</th>
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
                                <td>{{ $tsheet->user['operator_no'] }}</td>
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
