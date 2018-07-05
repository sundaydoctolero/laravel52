<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Workstation;
use App\Http\Requests\WorkstationRequest;

class WorkstationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {

        $workstations = Workstation::all();
        return view('admin.workstations.index',compact('workstations'));
    }


    public function create()
    {
        return view('admin.workstations.create');
    }


    public function store(WorkstationRequest $workstation)
    {
        $workstation = Workstation::create($workstation->all());
        return redirect('/workstations');
    }

    public function edit(Workstation $workstation)
    {
        return view('admin.workstations.edit',compact('workstation'));
    }


    public function update(WorkstationRequest $request, Workstation $workstation)
    {
        $workstation->update($request->all());
        return redirect('/workstations');
    }


    public function destroy(Workstation $workstation)
    {
        $workstation->delete();
        return redirect('/workstations');
    }
}
