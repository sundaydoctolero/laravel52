<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\LogSheet;
use Carbon\Carbon;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $daily = Logsheet::where('entry_date',Carbon::today())
                ->where('user_id',auth()->user()->id)->get()->sum('records');

        $monthly = Logsheet::where('user_id',auth()->user()->id)
                ->whereBetween('entry_date',[Carbon::today()->startOfMonth(),Carbon::today()])->get()->sum('records');

        $weekly = Logsheet::where('user_id',auth()->user()->id)
                ->whereBetween('entry_date',[Carbon::today()->subDays(Carbon::today()->dayOfWeek),Carbon::today()])->get()->sum('records');


        return view('home',compact('daily','weekly','monthly'));
    }
}
