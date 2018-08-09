<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Download;
use Carbon\Carbon;

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
            $downloads = Download::where('status','Closed')
                ->whereHas('output',function($query){
                    $query->where('output_date',Carbon::now()->toDateString());
            })->get();
        } else {
            if($request->delivery_time == ""){
                $downloads = Download::where('status','Closed')
                    ->whereHas('output',function($query) use ($request){
                        $query->where('output_date',$request->date_from);
                    })->get();
            } else {
                $downloads = Download::where('status','Closed')
                ->whereHas('output',function($query) use ($request){
                    $query->where('output_date',$request->date_from)->where('delivery_time',$request->delivery_time);
                })->get();
            }

        }
        $downloads->load('publication','output');

        return view($this->view_path.'.index',compact('downloads'));
    }
}
