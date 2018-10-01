@extends('layouts.admin.admin',['page_header' => 'Exception'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <a href="/exceptions/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add Exception</button></a>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="results_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Operator No</th>
                        <th>Employee</th>
                        <th class="text-center">Exception Type</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Time From</th>
                        <th class="text-center">Time To</th>
                        <th>Description</th>
                        <th>Paid</th>
                        <th>Status</th>
                        <th>Approver</th>
                        <th>Created Since</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exceptions as $key => $exception)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $exception->user->operator_no }}</td>
                        <td>{{ $exception->user->employee->firstname.' '.$exception->user->employee->lastname }}</td>
                        <td class="text-center">{{ $exception->exception_type }}</td>
                        <td class="text-center">{{ $exception->date_from }}</td>
                        <td class="text-center">{{ $exception->time_from }}</td>
                        <td class="text-center">{{ $exception->time_to }}</td>
                        <td>{{ $exception->description }}</td>
                        <td>{{ $exception->paid == 1 ? "Yes" : "No" }}</td>
                        <td><span class="label label-{{ $exception->status == 'Approved' ? 'success' : 'danger' }}">{{ $exception->status }}</span></td>
                        <td>{{ $exception->approver }}</td>
                        <td>{{ $exception->created_at->diffforHumans() }}</td>
                        <td class="text-center">
                            <a href="exceptions/{{ $exception->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
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

{{--@push('scripts')--}}
{{--<script>--}}
    {{--$.extend( true, $.fn.dataTable.defaults, {--}}
        {{--"order": [[ 4, "asc" ]],--}}
        {{--"pageLength": 50--}}
    {{--} );--}}
{{--</script>--}}
{{--@endpush--}}
