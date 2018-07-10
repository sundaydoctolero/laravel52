<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\State;
use App\Http\Requests\StateRequest;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $states = State::all();
        return view('admin.states.index',compact('states'));
    }


    public function create()
    {
        return view('admin.states.create');
    }


    public function store(StateRequest $request)
    {
        $state = State::create($request->all());
        return redirect('/states');
    }


    public function show($id)
    {

    }


    public function edit(State $state)
    {
        return view('admin.states.edit',compact('state'));
    }


    public function update(StateRequest $request, State $state)
    {
        $state->update($request->all());
        return redirect('/states');
    }


    public function destroy(State $state)
    {
        $state->delete();
        return redirect('/states');
    }
}
