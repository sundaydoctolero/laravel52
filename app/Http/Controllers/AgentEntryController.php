<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\LogSheet;
use App\Http\Requests\DownloadRequest;
use App\Http\Requests\LogSheetRequest;


class AgentEntryController extends Controller
{
    public $view_path = 'agent.log_sheets';

    public $url_path = '/agent/entries';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $downloads = Download::where('status','For Entry')->get();
        $downloads->load(['log_sheet' => function($query){
            $query->groupBy('user_id')->get();
        }]);
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function create(){
        return view($this->view_path.'.create');
    }

    public function store(LogSheetRequest $request){
        //auth()->download()->log_sheets()->create($request->all()); //one to many
        //return redirect($this->url_path);
    }

    public function edit(Download $download){
        $download->load(['log_sheet' => function($query){
           $query->where('user_id',auth()->user()->id)->get();
        }]);

        $log_sheets = Logsheet::where('download_id',$download->id)
                ->where('user_id','<>',auth()->user()->id)
                ->get();

        //return $log_sheets;
        return view($this->view_path.'.edit',compact('download','log_sheets'));
    }

    public function start_entry(Download $download,LogSheetRequest $request){

        $request['status'] = 'Ongoing';

        if($download->status != 'For Entry'){
            flash('Batch already Closed!!!')->warning()->important();
            return redirect('/agent/entries');
        }

        $request['batch_id'] = $download->publication->publication_code.'_'.str_replace('-','',$download->publication_date).'_'.substr($request->sale_rent,0,1).'_'.$request->batch_id;
        $request['start_time'] = Carbon::now();
        $download->log_sheet()->create($request->all() + ['user_id' => auth()->user()->id]);
        flash()->message('Added Successfully')->success();
        return redirect()->back();
    }

    public function end_entry(LogSheet $logsheet,Request $request){
        $request['end_time'] = Carbon::now();

        $startTime = Carbon::parse($logsheet->start_time);
        $finishTime = Carbon::parse($request->end_time);

        $totalDuration = $finishTime->diff($startTime);
        $request['total_time'] = $totalDuration->h.':'.$totalDuration->i.':'.$totalDuration->s;

        $logsheet->update($request->all());
        flash()->message('Record Updated')->success();
        return redirect()->back();
    }

    public function destroy(LogSheet $log_sheets){
        //$log_sheets->delete();
        //return redirect($this->url_path);
    }

    public function closed(Download $download){

        $log_sheets = $download->log_sheet;

        if($log_sheets->count() == 0){
            flash('May nagtatype pa!!!')->warning()->important();
            return redirect()->back();
        } else {
            if($log_sheets->groupBy('batch_id')->count() != $log_sheets->where('status','Finished')->count()){
                flash('May nagtatype pa!!!')->warning()->important();
                return redirect()->back();
            }
        }
        $download->update(['status'=>'For Output']);

        return redirect($this->url_path);
    }

}
