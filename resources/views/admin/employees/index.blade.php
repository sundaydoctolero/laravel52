@extends('layouts.admin.admin',['page_header' => 'Employees','logo' => 'fa fa-group'])

@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        <h3 class="box-title"><a href="/employees/create"><button class="btn btn-success"><i class="fa fa-plus"></i> Add New Menu</button></a></h3>
                    </div>
                </div>
                <div class="box-body">
                    <table id="results_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
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
                        </thead>
                        <tbody>

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
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>





@endsection