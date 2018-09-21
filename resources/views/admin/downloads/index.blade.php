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
                        <th class="text-center">Publication Date</th>
                        <th class="text-center">Pub Type</th>
                        <th class="text-center">Status</th>
                        <th>Remarks</th>
                        <th class="text-center">Check By</th>
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
                        <td class="text-center">{{ $download->status }}</td>
                        <td>{{ $download->remarks }}</td>
                        <td class="text-center">{{ $download->operator['username'] }}</td>
                        <td class="text-center">
                            <a href="/downloads/{{ $download->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            <div class="hidden">
                            {!! Form::model($download,['method'=>'DELETE','url' => '/downloads/'.$download->id,'style'=>'display:inline']) !!}
                            {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                            </div>
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
        "order": [[ 4, "asc" ]],
        "pageLength": 50
    } );
</script>
@endpush
