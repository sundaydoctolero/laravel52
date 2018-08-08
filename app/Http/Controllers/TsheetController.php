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

    public function index(Request $request)
    {

        if($request->all() == null){
            $agent_tsheets = Tsheet::whereBetween('created_at',[Carbon::now()->startOfDay(),Carbon::now()->endOfDay()])->get();
        } else {
            if($request->user_id == ""){
                $agent_tsheets = Tsheet::whereBetween('created_at',[$request->date_from.' 00:00:00',$request->date_to.' 23:59:59'])->get();
            } else {
                $agent_tsheets = Tsheet::where('user_id',$request->user_id)->whereBetween('created_at',[$request->date_from.' 00:00:01',$request->date_to.' 23:59:59'])->get();
            }
        }
        $agent_tsheets->load('job_number','user');
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
