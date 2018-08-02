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
        $download = Download::where('status','For Entry')
            ->where('locked_by',auth()->user()->id)->first();

        if(!$download){
            $download = Download::where('status','For Entry')
                ->where('no_of_batches','>',1)
                ->whereHas('operators',function($q){
                    $q->where('operator_no',auth()->user()->operator_no);
                })->first();

            if(!$download){
                $download = Download::where('status','For Entry')
                    ->where('locked_by','=',0)
                    ->where('no_of_batches',1)
                    ->orderBy('time_downloaded')
                    ->first();
            }
        }

        if($download){
            $download->load(['log_sheet' => function($query){
                $query->groupBy('user_id')->get();
            }]);
        } else {
            return abort(545);
        }


        return view($this->view_path.'.index',compact('download'));
    }

    public function create(){
        return view($this->view_path.'.create');
    }

    public function edit(Download $download){

        if($download->locked_by == 0){
            if($download->no_of_batches == 1){
                $download->update(['locked_by' => auth()->user()->id]);
            }
         } else {
            if($download->locked_by != auth()->user()->id){
                return redirect()->back();
            }
        }

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
            flash('No Log Found!!!')->warning()->important();
            return redirect()->back();
        } else {

            if($log_sheets->where('end_time','00:00:00')->count() != 0){
                flash('There are still ongoing batches!!!')->warning()->important();
                return redirect()->back();
            }

            if($log_sheets->where('status','Ongoing')->count() != 0){
                flash('There are still ongoing batchess!!!')->warning()->important();
                return redirect()->back();
            }

            $batches = Logsheet::where('download_id',$download->id)->groupBy('batch_id','state','sale_rent')->get();
            $finished = Logsheet::where('download_id',$download->id)->where('status','Finished')->groupBy('batch_id','state','sale_rent')->get();

            if($batches->count() != $finished->count()){
                flash('No of batches does not matched with no. of batch finished!!!')->warning()->important();
                return redirect()->back();
            }
        }

        $download->update(['status'=>'For Output']);
        return redirect($this->url_path);
    }

    public function back_to_entry(Download $download){
        $download->update(['locked_by'=>0]);

        $log_sheets = Logsheet::where('user_id',auth()->user()->id)
                ->where('end_time','00:00:00')->get();

        if($log_sheets->count() == 0){
            return redirect('/agent/entries');
        } else {
            flash('Check your log sheet!!!')->warning()->important();
            return redirect()->back();
        }

    }

}
