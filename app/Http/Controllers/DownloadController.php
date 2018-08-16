<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;
use App\Output;
use Carbon\Carbon;
use App\Publication;

class DownloadController extends Controller
{
    public $view_path = 'admin.downloads';

    public $url_path = '/downloads';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $downloads = Download::wherein('status',['For Download','Pending','For Query','Not Updated'])->orderBy('status')->get();
        $downloads->load('operator','publication');
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function create(){
        return view($this->view_path.'.create');
    }

    public function store(DownloadRequest $request){

        $checked_duplicate = Download::where('publication_id',$request->publication_id)
            ->where('publication_date',$request->publication_date)
            ->first();


        if(!$checked_duplicate){
            $download = Download::create($request->all() + ['added_by' => auth()->guard('admin')->user()->id]);
            //$download->output()->save(new Output());

            if($request->status == 'For Entry'){
                $download->update(['user_id' => auth()->guard('admin')->user()->id,'website_update_at'=>Carbon::now()->toDateString(),'time_downloaded'=>Carbon::now()]);
                $this->sync_to_offline_db($download,$request);
            }

            if($request->no_of_batches > 1 ){
                //$random_user = User::inRandomOrder()->limit($request->no_of_batches)->lists('id')->toArray();
                $download->operators()->attach($request->operator_list);
            }


            return redirect($this->url_path);
        } else {
            flash('Publication already exist')->warning();
            return redirect()->back();
        }

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
        return redirect($this->url_path);
    }

    public function destroy(Download $download){
        $download->delete();
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
            $url = "192.168.5.8/api/admin/downloads/process.php?action=save";
            $response = $client->createRequest("POST", $url,['body'=>$body]);
            $response = $client->send($response);
        }

    }



}
