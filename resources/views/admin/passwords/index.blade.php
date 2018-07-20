@extends('layouts.admin.admin',['page_header' => 'Passwords', 'logo' => 'fa fa-lock'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><a href="/passwords/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Password</button></a></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Account Name</th>
                            <th>Description</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th>Product Key</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($passwords as $password)
                            <tr>
                                <td>{{ $password->id }}</td>
                                <td>{{ $password->account_name }}</td>
                                <td>{{ $password->description }}</td>
                                <td>{{ $password->user_name }}</td>
                                <td>{{ $password->password }}</td>
                                <td>{{ $password->product_key }}</td>
                                <td>
                                    <a href="passwords/{{ $password->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                                    {!! Form::model($password,['method'=>'DELETE','url' => '/passwords/'.$password->id,'style'=>'display:inline']) !!}
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
