<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\LogSheet;
use Carbon\Carbon;
use App\Image;
use Calendar;
use App\Event;
use DB;
use App\User;


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

    public function generate_events(){

        $events = [];
        $data = $this->events();

        if($data->count()){
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    Carbon::parse($value->sdate),
                    Carbon::parse($value->edate)->addDays(1),
                    null,
                    [
                        'color' => '#f05050',
                        'url' => '/events/'.$value->id
                    ]
                );
            }
        }
        return $events;
    }

    public function generate_dtr(){
        $events = [];
        $data = $this->show_dtr();
        if($data){
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    substr($value->time_in,0,5).' - '.substr($value->time_out,0,5),
                    true,
                    Carbon::parse($value->dtr_date),
                    Carbon::parse($value->dtr_date)->addDays(1),
                    null,
                    [
                        'color' => '#0BAF03',
                        'url' => '/events/'.$value->id
                    ]
                );
            }
        }
        return $events;
    }

    public function generate_calendar(){
        Calendar::addEvents($this->generate_birthday());
        Calendar::addEvents($this->generate_events());
        return Calendar::addEvents($this->generate_dtr());
    }


    public function events(){
        return Event::where('user_id',auth()->user()->id)->limit(100)->get();
    }

    public function daily_records(){
        return Logsheet::where('entry_date',Carbon::today())
            ->where('user_id',auth()->user()->id)->get()->sum('records');
    }

    public function generate_birthday(){
        $events = [];
        $data = User::with('employee')->where('status','Active')->get();
        if($data){
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->employee['firstname'].'\'s Birthday!',
                    true,
                    Carbon::parse(Carbon::now()->year.substr($value->employee['birthdate'],4,6)),
                    Carbon::parse(Carbon::now()->year.substr($value->employee['birthdate'],4,6))->addDays(1),
                    null,
                    [
                        'color' => '#EB0BEE',
                        'url' => '/events/'.$value->id
                    ]
                );
            }
        }
        return $events;
    }

    public function show_dtr(){
        $sql = "select id,operator_no,dtr_date,
                MIN((select dtr_time from daily_time_records as tin where dtr_code = 1 and tin.operator_no = tl.operator_no and (tin.dtr_time = tl.dtr_time)limit 1)) as time_in,
                MAX((select dtr_time from daily_time_records as tout where dtr_code = 2 and tout.operator_no = tl.operator_no and (tout.dtr_time = tl.dtr_time)limit 1)) as time_out
                from daily_time_records as tl
                where operator_no = :operator_no
                group by operator_no,dtr_date ";

        return DB::select(DB::raw("$sql"),array('operator_no' => auth()->user()->operator_no ));
    }
}
