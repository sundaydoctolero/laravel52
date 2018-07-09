<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\AdminTsheetRequest;

use App\Tsheet;


use Carbon\Carbon;

class TsheetController extends Controller
{

    public $view_path = 'admin.tsheets';

    public $url_path = '/tsheets';

    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $agent_tsheets = Tsheet::all();
        return view($this->view_path.'.index',compact('agent_tsheets'));
    }

    public function create()
    {
        return view($this->view_path.'.create');
    }

    public function store(AdminTsheetRequest $request)
    {
        $startTime = Carbon::parse($request->start_time);
        $finishTime = Carbon::parse($request->end_time);

        $totalDuration = $finishTime->diff($startTime);
        $request['total_hours'] = $totalDuration->h.':'.$totalDuration->i.':'.$totalDuration->s;
        Tsheet::create($request->all());
        flash($request->tsheet_name.'Created succesfully')->success();
        return redirect($this->url_path);
    }
    public function edit(Tsheet $tsheet)
    {
        return view($this->view_path.'.edit',compact('tsheet'));
    }

    public function update(AdminTsheetRequest $request, Tsheet $tsheet)
    {

        $startTime = Carbon::parse($request->start_time);
        $finishTime = Carbon::parse($request->end_time);

        $totalDuration = $finishTime->diff($startTime);
        $request['total_hours'] = $totalDuration->h.':'.$totalDuration->i.':'.$totalDuration->s;

        $tsheet->update($request->all());
        flash($request->tsheet_name.'updated succesfully')->success();
        return redirect($this->url_path);
    }
}
