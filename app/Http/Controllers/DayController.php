<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DayRequest;
use App\Day;

class DayController extends Controller
{
    public $view_path = 'admin.days';

    public $url_path = '/days';

    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $days = Day::orderBy('day_name')->get();
        return view($this->view_path.'.index',compact('days'));
    }


    public function create()
    {
        return view($this->view_path.'.create');
    }


    public function store(DayRequest $request)
    {
        $days = Day::create($request->all());
        return redirect('/days');
    }


    public function show($id)
    {

    }


    public function edit(Day $day)
    {
        return view($this->view_path.'.edit',compact('day'));
    }


    public function update(DayRequest $request, Day $day)
    {
        $day->update($request->all());
        return redirect('/days');
    }


    public function destroy(Day $day)
    {
        $day->delete();
        return redirect('/days');
    }
}
