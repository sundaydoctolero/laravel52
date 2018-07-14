@extends('layouts.admin.admin',['page_header' => 'PublicationTypes'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/publicationtypes/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Publication Type</button></a></h3>

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
                        <th>Publication Type</th>
                        <th>Publication Description</th>
                        <th>Action</th>

                    </tr>
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
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
