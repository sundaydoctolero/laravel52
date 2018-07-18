@extends('layouts.admin.admin',['page_header' => 'Newspaper Reports'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-list"></i> Reports</h3>
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
                        <th>Remarks</th>
                        <th>Downloader</th>
                        <th>Keyers</th>
                        <th>Processor</th>
                        <th>Sale</th>
                        <th>Rent</th>
                        <th>Total</th>
                        <th>Seq. From</th>
                        <th>Seq. To</th>
                        <th>Date Delivered</th>
                        <th>Delivery Folder</th>
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
                        <td>{{ $download->remarks }}</td>
                        <td><small class="label label-info">{{ $download->user['operator_no'] }}</small></td>
                        <td>
                            @foreach($download->log_sheet as $operator=> $key)
                                <small class="label label-success">{{ $key->user->operator_no }}</small>
                            @endforeach
                        </td>
                        <td>
                            @foreach($download->output as $operator=> $key)
                                <small class="label label-danger">{{ $key->user['operator_no'] }}</small>
                            @endforeach
                        </td>
                            @foreach($download->output as $operator=> $key)
                                <td>{{ $key->sale_records }}</td>
                                <td>{{ $key->rent_records  }}</td>
                                <td>{{ $key->total_records }}</td>
                            @endforeach
                        <td>{{ $download->output->first()->sequence_from }}</td>
                        <td>{{ $download->output->first()->sequence_to }}</td>
                        <td>{{ $download->output->first()->output_date }}</td>
                        <td>{{ $download->output->first()->delivery_time }}</td>
                        <td>
                            <a href="/newspaper_reports/{{ $download->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
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
