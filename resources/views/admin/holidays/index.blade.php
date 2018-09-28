@extends('layouts.admin.admin',['page_header' => 'Holidays'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <a href="/holidays/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add Holiday</button></a>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="results_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th class="text-center">Holiday Name</th>
                        <th class="text-center">Holiday Code</th>
                        <th class="text-center">Holiday Type</th>
                        <th class="text-center">Holiday Rate</th>
                        <th>Description</th>
                        <th>Created Since</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($holidays as $holiday)
                    <tr>
                        <td>{{ $holiday->id }}</td>
                        <td class="text-center">{{ $holiday->holiday_date }}</td>
                        <td class="text-center">{{ $holiday->holiday_name }}</td>
                        <td class="text-center">{{ $holiday->holiday_code }}</td>
                        <td class="text-center">{{ $holiday->holiday_type }}</td>
                        <td class="text-center">{{ $holiday->holiday_rate }}</td>
                        <td>{{ $holiday->remarks }}</td>
                        <td>{{ $holiday->created_at->diffforHumans() }}</td>
                        <td class="text-center">
                            <a href="holidays/{{ $holiday->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>

                            {!! Form::close() !!}
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
