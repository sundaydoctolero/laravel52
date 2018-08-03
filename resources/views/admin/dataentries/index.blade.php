@extends('layouts.admin.admin',['page_header' => 'For Entry'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    For Entry : [ <strong>{{ $downloads->where('locked_by','>','0')->count() }} </strong>] &nbsp;
                    Ongoing : [ <strong>{{ $downloads->count() - $downloads->where('locked_by','>','0')->count() }} </strong>] &nbsp;
                    Pending : [ <strong>{{ $downloads->where('no_of_batches',0)->count() }} </strong>] &nbsp;
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="results_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Publication Name</th>
                        <th class="text-center">Publication Date</th>
                        <th class="text-center">Pub Type</th>
                        <th>Pages</th>
                        <th class="text-center">Batching</th>
                        <th class="text-center">Assigned To</th>
                        <th class="text-center">Ongoing</th>
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
                        <td>{{ $download->pages }}</td>
                        <td class="text-center">{!! batching_label($download->no_of_batches) !!}</td>
                        <td class="text-center">
                            @foreach($download->operators as $operator)
                                <small class="label label-danger">{{ $operator->operator_no }}</small>
                            @endforeach
                        </td>
                        <td class="text-center">
                            @foreach($download->operator_no as $optr)
                                <small class="label label-success">{{ $optr->operator_no }}</small>
                            @endforeach
                        </td>
                        <td>{{ $download->remarks }}</td>
                        <td class="text-center">
                            <a href="/dataentries/{{ $download->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
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
        "order": [[ 5, "desc" ]],
        "pageLength": 50,
    } );
</script>
@endpush
