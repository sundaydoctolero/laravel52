@extends('layouts.app.app',['page_header' => 'Outputs'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h1 class="box-title"><i class="fa fa-arrow-up"></i><b> Deliveries</b> </h1>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">


                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <th>Publication Name</th>
                        <th>Publication Date</th>
                        <th>Status</th>
                        <th>Sale</th>
                        <th>Rent</th>
                        <th>Sequence From</th>
                        <th>Sequence To</th>
                        <th>Output Date</th>
                        <th>Folder</th>
                        <th>Remarks</th>
                    </tr>
                    @foreach($downloads as $count => $delivered)
                            @foreach($delivered->output as $row)
                                <tr>
                                    <td>{{ $count++ + 1 }}</td>
                                    <td>{{ $delivered->publication->publication_name }}</td>
                                    <td>{{ $delivered->publication_date }}</td>
                                    <td>{{ $delivered->status }}</td>
                                    <td>{{ $row->sale_records }}</td>
                                    <td>{{ $row->rent_records }}</td>
                                    <td>{{ $row->sequence_from }}</td>
                                    <td>{{ $row->sequence_to }}</td>
                                    <td>{{ $row->output_date }}</td>
                                    <td>{{ $row->delivery_time }}</td>
                                    <td>{{ $row->remarks }}</td>
                                </tr>
                            @endforeach

                    @endforeach
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
