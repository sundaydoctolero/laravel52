<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;

class AgentDownloadController extends Controller
{
    public $view_path = 'agent.downloads';

    public $url_path = '/agent/downloads';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $downloads = Download::whereIn('status', ['For Download','Pending', 'Not Updated','For Query'])->get();
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function create(){
        return view($this->view_path.'.create');
    }

    public function store(DownloadRequest $request){
        auth()->user()->downloads()->create($request->all()); //one to many
        return redirect($this->url_path);
    }

    public function edit(Download $download){
        //$download->lockForUpdate()->get(); //database level

        if($download->locked_by == 0){
            $download->locked_by = auth()->user()->id;
            $download->save();
        } else {
            if($download->locked_by == auth()->user()->id){
                return view($this->view_path.'.edit',compact('download'));
            } else {
                flash('Publication already on process')->warning();
                return redirect()->back();
            }
        }

        return view($this->view_path.'.edit',compact('download'));

    }

    public function update(Download $download,DownloadRequest $request){
        $request['locked_by']= 0;
        if($request->status == 'For Entry'){
            $download->update($request->all() + ['user_id' => auth()->user()->id]);
        } else {
            $download->update($request->all() + ['checked_by' => auth()->user()->id]);
        }

        $download->update($request->all());
        return redirect($this->url_path);
    }

    public function destroy(Download $download){
        $download->delete();
        return redirect($this->url_path);
    }

}
