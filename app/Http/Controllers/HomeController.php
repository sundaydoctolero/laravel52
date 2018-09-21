<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\LogSheet;
use Carbon\Carbon;
use App\Image;
use Calendar;
use App\Event;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $calendar = $this->generate_calendar();

        $events = $this->events();

        $images = Image::where('image_path','homepage')->get();

        $daily = $this->daily_records();

        $monthly = Logsheet::where('user_id',auth()->user()->id)
                ->whereBetween('entry_date',[Carbon::today()->startOfMonth(),Carbon::today()])->get()->sum('records');

        $weekly = Logsheet::where('user_id',auth()->user()->id)
                ->whereBetween('entry_date',[Carbon::today()->subDays(Carbon::today()->dayOfWeek),Carbon::today()])->get()->sum('records');

        $log_sheets = Logsheet::where('user_id',auth()->user()->id)->where('end_time','00:00:00')->get();




        return view('home',compact('daily','weekly','monthly','images','calendar','log_sheets','events'));
    }

    public function generate_calendar(){
        $events = [];
        $data = $this->events();

        if($data->count()){
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title.Carbon::now()->format('l'),
                    false,
                    Carbon::now(),
                    Carbon::parse($value->end_date)->addDays(1)
                );
            }
        }
        return Calendar::addEvents($events);
    }

    public function events(){
        return Event::where('user_id',auth()->user()->id)->get();
    }

    public function daily_records(){
        return Logsheet::where('entry_date',Carbon::today())
            ->where('user_id',auth()->user()->id)->get()->sum('records');
    }

}
