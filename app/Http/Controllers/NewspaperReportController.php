<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;
use App\Http\Requests\NewspaperReportRequest;
use App\Output;
use App\Publication;
use Carbon\Carbon;

class NewspaperReportController extends Controller
{
    public $view_path = 'admin.newspaper_reports';

    public $url_path = '/newspaper_reports';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){


        if($request->all() == null) {
            $downloads = Download::where('status','Closed')
                ->whereHas('output',function ($query){
                    $query->whereBetween('output_date',[Carbon::today(),Carbon::today()])->orderBy('sequence_from');
                })->get();
        } else {
            if($request->delivery_time == ''){
                $downloads = Download::where('status','Closed')
                    ->whereHas('output',function ($query) use ($request){
                        $query->whereBetween('output_date',[$request->date_from,$request->date_to])->orderBy('sequence_from');
                    })->get();
            }else {
                $downloads = Download::where('status','Closed')
                    ->whereHas('output',function ($query) use ($request){
                        $query->where('delivery_time',$request->delivery_time)
                        ->whereBetween('output_date',[$request->date_from,$request->date_to])->orderBy('sequence_from');
                    })->get();
            }
        }

        $downloads->load('publication','output.user');
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function create(){
        return view($this->view_path.'.create');
    }

    public function store(DownloadRequest $request){
        Download::create($request->all());
        return redirect($this->url_path);
    }

    public function edit(Download $download){
        //$download->lockForUpdate()->get(); //database level
        $outputs = Output::where('download_id',$download->id)->get();
        return view($this->view_path.'.edit',compact('download','outputs'));

    }

    public function update(Download $download,DownloadRequest $request){
        $download->update($request->all());
        return redirect($this->url_path);
    }

    public function destroy(Download $download){
        $download->delete();
        return redirect($this->url_path);
    }

    public function not_updated_reports(Request $request){
        $downloads = Download::whereIn('status',$request->filter_list)->get();
        $filters = $request->filter_list;
        return view('admin.newspaper_reports.not_updated_reports',compact('downloads','filters'));
    }

    public function delivered_reports(Request $request){
        $downloads = Download::whereHas('output',function($q) use ($request){
            $q->whereBetween('output_date',[$request->date_from,$request->date_to]);
        })->get();

        return view('admin.newspaper_reports.delivered_reports',compact('downloads'));
    }

    public function generate_pub_details(Request $request){
        $downloads = Download::where('status','Closed')
            ->whereHas('output',function($q) use ($request){
            $q->where('output_date',$request->output_date)
                ->where('delivery_time',$request->delivery_time);
        })->get();

        return view('admin.newspaper_reports.publication_details',compact('downloads'));
    }

    public function download(Request $request){

        if($request->status == 0){
            $downloads = Download::whereBetween('website_update_at',[$request->date_from,$request->date_to])->get();
        } elseif($request->status == 1){
            $downloads = Download::where('status','Closed')
                ->whereHas('output',function($q) use ($request){
                    $q->whereBetween('output_date',[$request->date_from,$request->date_to]);
                })->get();
        }

        $downloads->load('publication','output2','operator_process');
        return view('admin.newspaper_reports.download',compact('downloads'));
    }


    public function edit_output_details(Output $output,Request $request){
        $output->update($request->all());
        return redirect()->back();
    }

    public function productivity(Request $request){

        if($request->all() == null){
            $downloads = [];
        } else {
            if($request->productivity == 'Download'){
                if($request->user_id == ""){
                    $downloads = Download::whereBetween('time_downloaded',[$request->date_from.' 00:00:00',$request->date_to.' 23:59:59'])
                        ->get();
                } else {
                    $downloads = Download::where('user_id',$request->user_id)
                        ->whereBetween('time_downloaded',[$request->date_from.' 00:00:00',$request->date_to.' 23:59:59'])
                        ->get();
                }
            }
            $downloads->load('publication');
        }


        return view('admin.newspaper_reports.productivity_reports',compact('downloads'));
    }

    public function monitoring(Request $request){
        $publications = Publication::whereNotIn('publication_type',['Inactive'])
            ->orderBy('publication_name')
            ->where('issue',$request->issue)
            ->get();


        if($request->all() == null){
           $publications->load(['states','downloads.output','downloads'=>function($query){
               $query->whereBetween('publication_date',[Carbon::now()->startOfMonth()->toDateString(),Carbon::now()->toDateString()]);
           }]);
        } else {
            $publications->load(['states','downloads.output','downloads'=>function($query) use ($request){
                $query->whereBetween('publication_date',[$request->date_from,$request->date_to]);
            }]);
        }

        return view('admin.newspaper_reports.monitoring',compact('publications'));
    }


}
