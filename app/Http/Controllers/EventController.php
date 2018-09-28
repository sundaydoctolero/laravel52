<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Calendar;
use App\Event;
use Carbon\Carbon;
use App\Holiday;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendar = $this->generate_calendar();
        return view('admin.events.index', compact('calendar'));
    }

    public function generate_calendar(){
        $events = $this->generate_holidays();
        return $events;
    }

    public function generate_holidays(){
        $events = [];
        $data = Holiday::all();
        if($data->count()){
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->holiday_name.' ('.$value->holiday_code.')',
                    true,
                    Carbon::parse($value->holiday_date),
                    Carbon::parse($value->holiday_date)->addDays(1),
                    null,
                    [
                        'color' => '#f05050',
                        'url' => '/events/'.$value->id
                    ]
                );
            }
        }
        return Calendar::addEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        auth()->user()->events()->create($request->all());
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('/');
    }
}
