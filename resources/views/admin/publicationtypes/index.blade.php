@extends('layouts.admin.admin',['page_header' => 'PublicationTypes'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/publicationtypes/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Publication Type</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="results_table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Publication Type</th>
                        <th>Publication Description</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publicationtypes as $publicationtype)
                    <tr>
                        <td>{{ $publicationtype->id }}</td>
                        <td>{{ $publicationtype->publication_type }}</td>
                        <td>{{ $publicationtype->publication_description }}</td>
                        <td>
                            <a href="publicationtypes/{{ $publicationtype->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($publicationtype,['method'=>'DELETE','url' => '/publicationtypes/'.$publicationtype->id,'style'=>'display:inline']) !!}
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
