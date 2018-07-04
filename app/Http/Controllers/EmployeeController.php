<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Employee;

use App\Http\Requests\EmployeeRequest;





class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index',compact('employees'));
    }


    public function create()
    {
        return view('admin.employees.create');
    }


    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        return redirect('/employees');
    }



    public function edit(Employee $employee)
    {
        return view('admin.employees.edit',compact('employee'));
    }


    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect('/employees');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees');
    }
}
