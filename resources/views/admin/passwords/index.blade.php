@extends('layouts.admin.admin',['page_header' => 'Passwords'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/passwords/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Record</button></a></h3>

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
                        <th>Account Name</th>
                        <th>Description</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Product Key</th>
                    </tr>
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
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>
@endsection
