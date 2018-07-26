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

        $closed = Download::where('status','For Download')->get();

        $filename = 'publication_details.txt';

        $file = fopen('publication_details.txt','w+');

        foreach($closed as $close){
            foreach($close->publication->states as $state){
                fwrite($file,'Publication Name: '.$state->state_code.'_'.str_replace(' ','_',strtoupper($close->publication->publication_name))."\r\n");
                fwrite($file,'Publication Date: '.$close->publication_date."\r\n");
                fwrite($file,'Publication State: '.$state->state_code."\r\n\r\n");
            }
        }

        fclose($file);

        $headers = array('Content-Type' => 'text/csv');
        return response()->download('publication_details.txt',$filename,$headers);
    }
}
