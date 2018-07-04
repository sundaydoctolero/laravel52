@extends('layouts.admin.admin',['page_header' => 'Employees'])

@section('main-content')
    <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>

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
                        <th>No.</th>
                        <th>Display Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>FirstName</th>
                        <th>Last Name</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Designation</th>
                        <th>Date Hired</th>
                        <th>Date Left</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id  }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->employee->department->dept_name }}</td>
                        <td>{{ $employee->employee->firstname }}</td>
                        <td>{{ $employee->employee->lastname }}</td>
                        <td>{{ $employee->employee->birthdate }}</td>
                        <td>{{ $employee->employee->gender }}</td>
                        <td>{{ $employee->employee->contact }}</td>
                        <td>{{ $employee->employee->address }}</td>
                        <td>{{ $employee->employee->designation }}</td>
                        <td>{{ $employee->employee->date_hired }}</td>
                        <td>{{ $employee->employee->date_left }}</td>
                        <td>
                            <a href="employees/{{ $employee->employee->id }}/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Modify</button></a>
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
