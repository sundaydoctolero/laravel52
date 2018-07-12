@extends('layouts.admin.admin',['page_header' => 'Backups'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/backups/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Filename</th>
                            <th>Backup Size</th>
                            <th>Backup Description</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
