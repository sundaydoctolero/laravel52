<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\TaskRequest;

use App\Task;

class AgentTaskController extends Controller
{
    public $view_path = 'agent.tasks';

    public $url_path = '/agent/tasks';

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $results = auth()->user()->tasks;
        return view($this->view_path.'.index',compact('results'));
    }

    public function create()
    {
        return view($this->view_path.'.create');
    }

    public function store(TaskRequest $request)
    {
        auth()->user()->tasks()->create($request->all());
        flash($request->task_name.' Created succesfully')->success();
        return redirect($this->url_path);
    }
    public function edit(Task $task)
    {
        return view($this->view_path.'.edit',compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        flash($request->task_name.' updated succesfully')->success();
        return redirect($this->url_path);
    }
}
