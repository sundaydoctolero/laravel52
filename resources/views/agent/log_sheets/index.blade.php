@extends('layouts.app.app',['page_header' => 'Add Log-Sheet'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>

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
                        <th>Pages</th>
                        <th>Remarks</th>
                        <th>Operators</th>
                        <th>Action</th>
                    </tr>

                        <tr>
                            <td>{{ $download->id }}</td>
                            <td>{{ $download->publication->publication_name }}</td>
                            <td>{{ $download->publication_date }}</td>
                            <td>
                                @if($download->log_sheet->count() >= 1)
                                    Ongoing
                                @else
                                    {{ $download->status }}
                                @endif
                            </td>
                            <td>{{ $download->pages }}</td>
                            <td>{{ $download->remarks }}</td>
                            <td>
                                @foreach($download->log_sheet as $operator=> $key)
                                    <small class="label label-success">{{ $key->user->operator_no }}</small>
                                @endforeach
                            </td>
                            <td>
                                <a href="/agent/entries/{{ $download->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Get</button></a>
                            </td>
                        </tr>
                    
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
