@extends('layouts.admin.admin',['page_header' => 'For Output'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="results_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Publication Name</th>
                        <th>Publication Date</th>
                        <th>Pub Type</th>
                        <th>Status</th>
                        <th>Downloader</th>
                        <th>Operators</th>
                        <th>Remarks</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($downloads as $download)
                        <tr>
                            <td>{{ $download->id }}</td>
                            <td>{{ $download->publication->publication_name }}</td>
                            <td class="text-center">{{ $download->publication_date }}</td>
                            <td class="text-center">{{ $download->publication->publication_type }}</td>
                            <td>{{ $download->status }}</td>
                            <td class="text-center"><small class="label label-info">{{ $download->user['operator_no'] }}</small></td>
                            <td>
                                @foreach($download->log_sheet as $operator)
                                      <small class="label label-success">{{ $operator->user->operator_no }}</small>
                                 @endforeach
                            </td>
                            <td>{{ $download->remarks }}</td>
                            <td class="text-center">
                                <a href="/outputs/{{ $download->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
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

@push('scripts')
<script>
    $.extend( true, $.fn.dataTable.defaults, {
        "pageLength": 50,
    } );
</script>
@endpush
