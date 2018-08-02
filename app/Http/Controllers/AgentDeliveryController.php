<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Download;


class AgentDeliveryController extends Controller
{
    public $view_path = 'agent.deliveries';

    public $url_path = '/agent/deliveries';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $downloads = Download::where('status','Closed')->get();
        $downloads->load('publication','output2');
        return view($this->view_path.'.index',compact('downloads'));
    }
}
