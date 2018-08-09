<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;
use App\Output;
use App\Logsheet;
use Carbon\Carbon;

class DataEntryController extends Controller
{
    public $view_path = 'admin.dataentries';

    public $url_path = '/dataentries';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $downloads = Download::wherein('status',['For Entry'])
            ->orderBy('no_of_batches','desc')
            ->orderBy('time_downloaded')
            ->get();
        $downloads->load('publication','operators','operator_locked');
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function edit(Download $download){
        //$download->lockForUpdate()->get(); //database level
        $download->load('log_sheet');
        $log_sheets = Logsheet::where('download_id',$download->id)->get();
        return view($this->view_path.'.edit',compact('download','log_sheets'));
    }

    public function update(Download $download,DownloadRequest $request){
        $download->update($request->all());
        if($request->operator_list){
            $download->operators()->sync($request->operator_list);
        } else {
            $download->operators()->detach();
        }
        return redirect($this->url_path);
    }

    public function edit_log_sheet(Logsheet $log_sheet,Request $request){
        //$download->lockForUpdate()->get(); //database level

        $startTime = Carbon::parse($request->start_time);
        $finishTime = Carbon::parse($request->end_time);
        $totalDuration = $finishTime->diff($startTime);
        $request['total_time'] = $totalDuration->h.':'.$totalDuration->i.':'.$totalDuration->s;

        $request['batch_id'] = substr_replace($request->batch_id,substr($request->sale_rent,0,1),13,1);
        $log_sheet->update(request()->except(['_method','_token']));
        flash('Log sheet updated')->success();
        return redirect()->back();
    }


}
