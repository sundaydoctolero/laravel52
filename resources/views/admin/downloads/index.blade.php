@extends('layouts.admin.admin',['page_header' => 'Add Downloads'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    <a href="/downloads/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Download</button></a>
                    <a href="/downloads/imports"><button class="btn btn-success"><i class="fa fa-plus"></i> Batch Import</button></a>
                </h3>
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
                        <th>Pages</th>
                        <th>Remarks</th>
                        <th>Check By</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($downloads as $download)
                    <tr>
                        <td>{{ $download->id }}</td>
                        <td>{{ $download->publication->publication_name }}</td>
                        <td>{{ $download->publication_date }}</td>
                        <td>{{ $download->publication->publication_type }}</td>
                        <td>{{ $download->status }}</td>
                        <td>{{ $download->pages }}</td>
                        <td>{{ $download->remarks }}</td>
                        <td>
                            @foreach($download->operator_no_check as $operator)
                                <small class="label label-success">{{ $operator->operator_no }}</small>
                            @endforeach
                        </td>
                        <td>
                            <a href="/downloads/{{ $download->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($download,['method'=>'DELETE','url' => '/downloads/'.$download->id,'style'=>'display:inline']) !!}
                            {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
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
