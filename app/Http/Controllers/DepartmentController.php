<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Department;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index',compact('departments'));
    }


    public function create()
    {
        return view('admin.departments.create');
    }


    public function store(DepartmentRequest $department)
    {
        $task = Department::create($department->all());
        return redirect('/departments');
    }


    public function show($id)
    {

    }


    public function edit(Department $department)
    {
        return view('admin.departments.edit',compact('department'));
    }


    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->all());
        return redirect('/departments');
    }


    public function destroy(Department $department)
    {
        $department->delete();
        return redirect('/departments');
    }

}