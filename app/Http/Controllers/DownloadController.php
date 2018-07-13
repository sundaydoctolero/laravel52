<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;
use App\Output;

class DownloadController extends Controller
{
    public $view_path = 'admin.downloads';

    public $url_path = '/downloads';

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        $downloads = Download::wherein('status',['For Download','Pending','For Query','Not Updated','For Entry','For Output'])->get();
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function create(){
        return view($this->view_path.'.create');
    }

    public function store(DownloadRequest $request){
        $download = Download::create($request->all());
        $download->output()->save(new Output());
        return redirect($this->url_path);
    }

    public function edit(Download $download){
        //$download->lockForUpdate()->get(); //database level

        return view($this->view_path.'.edit',compact('download'));

    }

    public function update(Download $download,DownloadRequest $request){
        $download->update($request->all());
        return redirect($this->url_path);
    }

    public function destroy(Download $download){
        $download->delete();
        return redirect($this->url_path);
    }

}
