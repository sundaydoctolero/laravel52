<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;
use App\Http\Requests\HolidayRequest;
use App\Http\Requests;

class HolidayController extends Controller
{
    public $view_path = 'admin.holidays';

    public $url_path = '/holidays';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $holidays = Holiday::orderBy('holiday_name')->get();
        return view($this->view_path.'.index',compact('holidays'));
    }

    public function create() {
        return view($this->view_path.'.create');
    }

    public function store(HolidayRequest $request)
    {
        Holiday::create($request->all());
        return redirect('/holidays');
    }

    public function show($id)
    {

    }

    public function edit(Holiday $holiday)
    {


        return view($this->view_path.'.edit',compact('holiday'));
    }


    public function update(HolidayRequest $request, Holiday $holiday)
    {

        $holiday->update($request->all());
        return redirect('/holidays');
    }


    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return redirect('/holidays');
    }
}
