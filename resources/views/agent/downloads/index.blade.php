@extends('layouts.app.app',['page_header' => 'Add Downloads'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h1 class="box-title"><i class="fa fa-arrow-down"></i><b> Downloads </b>
                    <small class="label label-success">{{ $downloads->where('status','For Download')->count() }}</small>
                    <small class="label label-danger">{{ $downloads->where('status','Not Updated')->count() }}</small>
                    <small class="label label-info">{{ $downloads->where('status','For Query')->count() }}</small>
                    <small class="label label-warning">{{ $downloads->where('status','Pending')->count() }}</small>
                </h1>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">


                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th>Publication Name</th>
                        <th>Publication Date</th>
                        <th class="text-center">Publication Type</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Downloader</th>
                        <th>Checked By</th>
                        <th>Action</th>
                    </tr>
                    @foreach($downloads as $download)
                    <tr>
                        <td>{{ $download->publication->publication_name }}</td>
                        <td class="text-center">{{ $download->publication_date }}</td>
                        <td class="text-center">{{ $download->publication->publication_type }}</td>
                        <td class="text-center">{{ $download->status }}</td>
                        <td>{{ $download->remarks }}</td>
                        <td class="text-center"><small class="label label-success">{{ $download->operator_locked['operator_no'] }}</small></td>
                        <td class="text-center"><small class="label label-info">{{ $download->operator['operator_no'] }}</small></td>
                        <td>
                            <a href="/agent/downloads/{{ $download->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Locked</button></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
