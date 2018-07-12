@extends('layouts.admin.admin',['logo'=> 'fa fa-user-secret','page_header' => 'Admin Users'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/admins/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Created Since</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>





@endsection
