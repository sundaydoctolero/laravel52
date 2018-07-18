@extends('layouts.admin.admin',['page_header' => 'Publication Issues'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/publicationissues/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Publication Issue</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="results_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Issue Name</th>
                        <th>Issue Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publicationissues as $publicationissue)
                    <tr>
                        <td>{{ $publicationissue->id }}</td>
                        <td>{{ $publicationissue->issue_name }}</td>
                        <td>{{ $publicationissue->issue_description }}</td>
                        <td>
                            <a href="publicationissues/{{ $publicationissue->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($publicationissue,['method'=>'DELETE','url' => '/publicationissues/'.$publicationissue->id,'style'=>'display:inline']) !!}
                            {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}

                            {!! Form::close() !!}
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
