<?php

namespace App\Http\Controllers;

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


        auth()->download()->log_sheets()->create($request->all()); //one to many
        return redirect($this->url_path);
    }

    public function edit(Download $download){
        $download->load('log_sheet');
        return view($this->view_path.'.edit',compact('download'));

    }

    public function update(Download $download,LogSheetRequest $request){
        $download->log_sheet()->create($request->all() + ['user_id' => auth()->user()->id]);
        flash()->message('Added Successfully')->success();
        return redirect()->back();
    }

    public function destroy(LogSheet $log_sheets){
        $log_sheets->delete();
        return redirect($this->url_path);
    }

    public function closed(Download $download){

        $log_sheets = $download->log_sheet;




        if($log_sheets->count() == 0){
            flash('Cannot be closed!!!')->warning()->important();
            return redirect()->back();
        } else {
            if($log_sheets->groupBy('batch_id')->count() != $log_sheets->where('status','Finished')->count()){
                flash('Cannot be closed!!!')->warning()->important();
                return redirect()->back();
            }
        }
        $download->update(['status'=>'For Output']);

        return redirect($this->url_path);
    }

}
