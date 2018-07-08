@extends('layouts.admin.admin',['page_header' => 'Job Numbers'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/jobnumbers/create"><button class="btn btn-success"><i class="fa fa-plus"></i>Add New Job Number</button></a></h3>

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
                        <th>Job Number</th>
                        <th>Job Number Description</th>
                        <th>Month Of</th>
                        <th>Action</th>
                    </tr>
                    @foreach($jobnumbers as $jobnumber)
                    <tr>
                        <td>{{ $jobnumber->id }}</td>
                        <td>{{ $jobnumber->job_number_id }}</td>
                        <td>{{ $jobnumber->job_number_description }}</td>
                        <td>{{ $jobnumber->month_of }}</td>
                        <td>
                            <a href="jobnumbers/{{ $jobnumber->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Modify</button></a>
                            {!! Form::model($jobnumber,['method'=>'DELETE','url' => '/jobnumbers/'.$jobnumber->id,'style'=>'display:inline']) !!}
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
