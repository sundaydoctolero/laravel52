@extends('layouts.admin.admin',['page_header' => 'Admin Users'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/admins/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Record</button></a></h3>

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
                        <th>Photo</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Created Since</th>
                        <th>Action</th>
                    </tr>
                    @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td><img height="60px" src="{{ asset('images/userprofile/'.$admin->user_photo) }}"></td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            @foreach($admin->roles as $role)
                                <small class="label label-success">{{ $role->name }}</small>
                            @endforeach
                        </td>
                        <td>{{ $admin->created_at->diffforHumans() }}</td>
                        <td>
                            <a href="admins/{{ $admin ->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($admin,['method'=>'PATCH','url' => '/admins/'.$admin->id.'/reset_default_password','style'=>'display:inline']) !!}
                            {{ Form::button('<i class="fa fa-rotate-left"></i> Reset Password', ['type' => 'submit', 'class' => 'btn btn-warning btn-sm'] )  }}

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
