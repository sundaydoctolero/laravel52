<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('roles:Admin,Normal Admin');
    }


    public function index()
    {
        $tasks = Task::orderBy('status','desc')->get();
        return view('admin.tasks.index',compact('tasks'));
    }


    public function create()
    {
        return view('admin.tasks.create');
    }


    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return redirect('/tasks');
    }


    public function show($id)
    {

    }


    public function edit(Task $task)
    {
        return view('admin.tasks.edit',compact('task'));
    }


    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all()+['admin_id'=>auth()->guard('admin')->user()->id]);
        return redirect('/tasks');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }
}
