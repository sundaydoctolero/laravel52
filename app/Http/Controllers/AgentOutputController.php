<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;

use App\Http\Requests\OutputRequest;
use App\Output;
use App\Logsheet;
use DB;

class AgentOutputController extends Controller
{
    public $view_path = 'agent.outputs';

    public $url_path = '/agent/outputs';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $downloads = Download::where('status','For Output')->get();
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function edit(Download $download){
        //$download->lockForUpdate()->get(); //database level
        $output = Output::findorfail($download->output->first()->id);

        $records_summaries =  DB::table('log_sheets')
            ->where('download_id',$download->id)
            ->select('state','sale_rent','records', DB::raw('SUM(records) as total_records'))
            ->groupBy('state','sale_rent')
            ->get();
        return view($this->view_path.'.edit',compact('download','output','records_summaries'));
    }

    public function update(Download $download,OutputRequest $request){
        $download->update($request->only('status'));
        $output = $output = Output::findorfail($download->output->first()->id);
        $output->update($request->all() + ['user_id' => auth()->user()->id]);
        return redirect($this->url_path);
    }

    public function destroy(Download $download){
        $download->delete();
        return redirect($this->url_path);
    }

}
