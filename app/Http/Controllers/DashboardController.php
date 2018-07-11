<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('roles:Admin,User');
    }

    public function index(Request $request){
          return view('admin.dashboard');
    }
}
