@extends('layouts.admin.admin',['page_header' => 'Employees'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="/employees/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Employee</button></a></h3>

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

                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Designation</th>
                        <th>Date Hired</th>
                        <th>Date Left</th>
                    </tr>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->lastname }}</td>
                        <td>{{ $employee->birthdate }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>{{ $employee->contact }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->designation }}</td>
                        <td>{{ $employee->date_hired }}</td>
                        <td>{{ $employee->date_left }}</td>
                        <td>
                            <a href="employees/{{ $employee->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
                            {!! Form::model($employee,['method'=>'DELETE','url' => '/employees/'.$employee->id,'style'=>'display:inline']) !!}
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
