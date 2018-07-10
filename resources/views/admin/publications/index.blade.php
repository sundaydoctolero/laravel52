@extends('layouts.admin.admin',['page_header' => 'Publications'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/publications/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Publication</button></a></h3>

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
                        <th>States</th>
                        <th>Publication Name</th>
                        <th>Website URL</th>
                        <th>Issue Date</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>State</th>
                        <th>Publication Type</th>
                        <th>Action</th>



                    </tr>
                    @foreach($publications as $publication)
                    <tr>
                        <td>{{ $publication->id }}</td>
                        <td>
                            @foreach($publication->states as $state)
                                <small class="label label-success">{{ $state->state_code }}</small>
                            @endforeach
                        </td>
                        <td>{{ $publication->publication_name }}</td>
                        <td>{{ $publication->website }}</td>
                        <td>{{ $publication->issue }}</td>
                        <td>{{ $publication->username }}</td>
                        <td>{{ $publication->password }}</td>
                        <td>{{ $publication->state }}</td>
                        <td>{{ $publication->publication_type }}</td>

                        <td>
                            <a href="publications/{{ $publication->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($publication,['method'=>'DELETE','url' => '/publications/'.$publication->id,'style'=>'display:inline']) !!}
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
