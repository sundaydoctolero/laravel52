<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use App\Download;
use App\Publication;
use Carbon\Carbon;


class TestController extends Controller
{
    //public function __construct(){
      //  $this->middleware('auth');
   // }

    public function index(){

        $users  = User::all();

        return view('test.index');

        return Response::json(array(
           'error' => false,
            'users' => $users,
            'status_code' => 200
        ));
    }

    public function sample(){






    }
}
