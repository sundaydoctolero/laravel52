<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;
use Carbon\Carbon;

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
        $downloads->load('publication','operator','operator_locked');
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function create(){
        return view($this->view_path.'.create');
    }

    public function edit(Download $download){
        //$download->lockForUpdate()->get(); //database level
        if($download->status == 'For Entry' || $download->status == 'For Output'){
            flash('Publication already downloaded')->warning();
            return redirect()->back();
        }


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
            $download->update($request->all() + ['user_id' => auth()->user()->id,'time_downloaded' => Carbon::now()]);
            $this->sync_to_offline_db($download,$request);
        } else {
            $download->update($request->all() + ['checked_by' => auth()->user()->id]);
        }

        $download->update($request->all());
        return redirect($this->url_path);
    }

    public function sync_to_offline_db($download,$request){
        foreach($download->publication->states as $state){
            $body['state'] = $state->state_code;
            $body['publication_name'] = $download->publication->publication_name;
            $body['publication_date'] = $download->australian_format;
            $body['pages'] = $download->pages;
            $body['remarks'] = $download->remarks;
            $body['status'] = 'OPEN';
            $body['download_id'] = $download->user['operator_no'];
            $body['code'] = $download->publication->publication_code;
            $body['job_number'] = $download->publication->job_number_code;

            $client = new \GuzzleHttp\Client();
            $url = "192.168.5.57/api/admin/downloads/process.php?action=save";
            $response = $client->createRequest("POST", $url,['body'=>$body]);
            $response = $client->send($response);
        }

    }
}
