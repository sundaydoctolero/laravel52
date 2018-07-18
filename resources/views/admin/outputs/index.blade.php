@extends('layouts.admin.admin',['page_header' => 'For Output'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><button class="btn btn-success"><i class="fa fa-link"></i> Output</button></a></h3>

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
                    <tbody><tr>
                        <th>ID</th>
                        <th>Publication Name</th>
                        <th>Publication Date</th>
                        <th>Status</th>
                        <th>Pages</th>
                        <th>No. of Batch</th>
                        <th>Operators</th>
                        <th>Remarks</th>
                        <th>Locked By</th>
                        <th>Action</th>
                    </tr>
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
                        <td>{{ $download->remarks }}</td>
                        <td>
                            @foreach($download->operator_no as $optr)
                                <small class="label label-success">{{ $optr->operator_no }}</small>
                            @endforeach
                        </td>
                        <td>
                            <a href="/downloads/{{ $download->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($download,['method'=>'DELETE','url' => '/downloads/'.$download->id,'style'=>'display:inline']) !!}
                            {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
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
