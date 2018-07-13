<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\TsheetRequest;

use App\Tsheet;

use Carbon\Carbon;

class AgentTsheetController extends Controller
{
    public $view_path = 'agent.tsheets';

    public $url_path = '/agent/tsheets';


    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $tsheets = auth()->user()->tsheets;
        $tsheet_status = auth()->user()->tsheets->last();
        return view($this->view_path.'.index',compact('tsheets','tsheet_status'));
    }

    public function create()
    {

        return view($this->view_path.'.create');
    }

    public function store(TsheetRequest $request)
    {
        $request['start_time'] = Carbon::now();
        auth()->user()->tsheets()->create($request->all());
        flash($request->tsheet_name.' Created succesfully')->success();
        return redirect($this->url_path);
    }
    public function edit(Tsheet $tsheet)
    {
        return view($this->view_path.'.edit',compact('tsheet'));
    }

    public function update(TsheetRequest $request, Tsheet $tsheet)
    {
        $request['end_time'] = Carbon::now();

        $startTime = Carbon::parse($tsheet->start_time);
        $finishTime = Carbon::parse($request->end_time);

        $totalDuration = $finishTime->diff($startTime);
        $request['total_hours'] = $totalDuration->h.':'.$totalDuration->i.':'.$totalDuration->s;

        $tsheet->update($request->all());
        flash($request->tsheet_name.' updated succesfully')->success();
        return redirect($this->url_path);
    }


}
