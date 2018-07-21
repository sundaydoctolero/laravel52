<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;
use App\Output;

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
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function edit(Download $download){
        //$download->lockForUpdate()->get(); //database level
        return view($this->view_path.'.edit',compact('download'));

    }

    public function update(Download $download,DownloadRequest $request){


        return "hello";
        return $request->publication_date->format('m/d/Y');

        $publication_details = Publication::find($request->publication_id);


        foreach($publication_details->states as $state){
            $body['state'] = $state->state_code;
            $body['publication_name'] = $publication_details->publication_name;
            $body['publication_date'] = Carbon::now()->format('d/m/Y');
            $body['pages'] = '0';
            $body['remarks'] = '';
            $body['status'] = 'OPEN';
            $body['download_id'] = auth()->guard('admin')->user()->operator_no;
            $body['job_number'] = '1234';


            $client = new \GuzzleHttp\Client();
            $url = "127.0.0.1/odesv2.0/admin/downloads/process.php?action=save";


            $response = $client->createRequest("POST", $url,['body'=>$body]);


            $response = $client->send($response);


            dd($response);

        }

        return "hello";

        $download->update($request->all());
        if($request->operator_list){
            $download->operators()->sync($request->operator_list);
        } else {
            $download->operators()->detach();
        }
        return redirect($this->url_path);
    }
}
