@extends('layouts.admin.admin',['page_header' => 'Users', 'logo' => 'fa fa-users'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/users/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Optr No.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created Since</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><img height="60px" src="{{ asset('images/userprofile/'.$user->user_photo) }}"></td>
                                <td>{{ $user->operator_no }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->diffforHumans() }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <a href="users/{{ $user->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                                    {!! Form::model($user,['method'=>'PATCH','url' => '/users/'.$user->id.'/reset_default_password','style'=>'display:inline']) !!}
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
