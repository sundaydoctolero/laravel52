<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\JobNumber;
use App\Http\Requests\JobNumberRequest;

class JobNumberController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {
        $jobnumbers = JobNumber::all();
        return view('admin.jobnumbers.index',compact('jobnumbers'));
    }


    public function create()
    {
        return view('admin.jobnumbers.create');
    }


    public function store(JobNumberRequest $jobnumber)
    {
        $jobnumber = JobNumber::create($jobnumber->all());
        return redirect('/jobnumbers');
    }


    public function show($id)
    {

    }


    public function edit(JobNumber $jobnumber)
    {
        return view('admin.jobnumbers.edit',compact('jobnumber'));
    }


    public function update(JobNumberRequest $request, JobNumber $jobnumber)
    {
        $jobnumber->update($request->all());
        return redirect('/jobnumbers');
    }


    public function destroy(JobNumber $jobnumber)
    {
        $jobnumber->delete();
        return redirect('/jobnumbers');
    }
}
