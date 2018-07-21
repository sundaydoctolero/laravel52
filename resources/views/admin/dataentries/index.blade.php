@extends('layouts.admin.admin',['page_header' => 'For Entry'])

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
                        <th>Status</th>
                        <th>Pages</th>
                        <th>No. of Batch</th>
                        <th>Operators</th>
                        <th>Locked By</th>
                        <th>Remarks</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($downloads as $download)
                    <tr>
                        <td>{{ $download->id }}</td>
                        <td>{{ $download->publication->publication_name }}</td>
                        <td>{{ $download->publication_date }}</td>
                        <td>{{ $download->status }}</td>
                        <td>{{ $download->pages }}</td>
                        <td>{{ $download->no_of_batches }}</td>
                        <td>
                            @foreach($download->operators as $operator)
                                <small class="label label-success">{{ $operator->operator_no }}</small>
                            @endforeach
                        </td>
                        <td>
                            @foreach($download->operator_no as $optr)
                                <small class="label label-success">{{ $optr->operator_no }}</small>
                            @endforeach
                        </td>
                        <td>{{ $download->remarks }}</td>
                        <td>
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
