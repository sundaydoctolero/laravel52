<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;
use App\Output;
use App\Logsheet;

class DataEntryController extends Controller
{
    public $view_path = 'admin.dataentries';

    public $url_path = '/dataentries';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $downloads = Download::wherein('status',['For Entry'])->get();
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
}
