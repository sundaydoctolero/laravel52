<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\Download;
use Carbon\Carbon;
use App\Logsheet;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('roles:Admin,User');
    }

    public function index(Request $request){
        $not_updated = Download::whereIn('status',['Not Updated','Pending','For Query'])->get()->count();
        $for_download = Download::whereIn('status',['For Download'])->get()->count();
        $for_entry = Download::whereIn('status',['For Entry'])->get()->count();

        $delivered_today = Download::where('status','Closed')
            ->whereHas('output2',function($query){
                $query->where('output_date',Carbon::now()->toDateString());
            })->get()->count();

        $ongoings = Logsheet::where('status','Ongoing')->get();
        $ongoings->load('user','download.publication');

        return view('admin.dashboard',compact('not_updated','for_download','delivered_today','for_entry','ongoings'));
    }
}
