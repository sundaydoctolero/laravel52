@extends('layouts.admin.admin',['page_header' => 'Backups'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/backups/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Backup</button></a></h3>

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
                        <th>Filename</th>
                        <th>Backup Size</th>
                        <th>Backup Description</th>
                        <th>Action</th>

                    </tr>
                    @foreach($backups as $backup)
                    <tr>
                        <td>{{ $backup->id }}</td>
                        <td>{{ $backup->filename }}</td>
                        <td>{{ $backup->backup_size }}</td>
                        <td>{{ $backup->description }}</td>
                        <td>
                            <a href="backups/{{ $backup->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($backup,['method'=>'DELETE','url' => '/backups/'.$backup->id,'style'=>'display:inline']) !!}
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
