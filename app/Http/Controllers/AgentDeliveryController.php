<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Download;
use Carbon\Carbon;
use App\Output;

class AgentDeliveryController extends Controller
{
    public $view_path = 'agent.deliveries';

    public $url_path = '/agent/deliveries';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if($request->all() == null){
            $outputs = Output::where('output_date',Carbon::now()->toDateString())
                ->orderBy('sequence_from')
                ->get();
        } else {
            if($request->delivery_time == ""){
                $outputs = Output::where('output_date',$request->date_from)
                    ->orderBy('sequence_from')
                    ->get();
            } else {
                $outputs = Output::where('output_date',$request->date_from)
                    ->where('delivery_time',$request->delivery_time)->orderBy('sequence_from')
                    ->get();

            }
        }

        $outputs->load('download.publication');

        return view($this->view_path.'.index',compact('downloads','outputs'));
    }
}
