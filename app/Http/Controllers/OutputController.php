<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;
use App\Output;
use App\LogSheet;

class OutputController extends Controller
{
    public $view_path = 'admin.outputs';

    public $url_path = '/outputs';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $downloads = Download::wherein('status',['For Output'])->get();
        $downloads->load(['user','publication','log_sheet.user']);


        return view($this->view_path.'.index',compact('downloads'));
    }

    public function edit(Download $download){
        //$download->lockForUpdate()->get(); //database level
        return view($this->view_path.'.edit',compact('download'));
    }

    public function update(Download $download,DownloadRequest $request){
        $download->update($request->all());
        if($request->operator_list){
            $download->operators()->sync($request->operator_list);
        } else {
            $download->operators()->detach();
        }

        if($request->status = 'For Entry'){
            return redirect('/dataentries');
        }

        return redirect($this->url_path);
    }

    public function destroy(Download $download){
        $download->delete();
        return redirect($this->url_path);
    }
}
