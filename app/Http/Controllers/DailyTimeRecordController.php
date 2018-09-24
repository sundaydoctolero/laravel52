<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyTimeRecord;

use App\Http\Requests;
use DB;

class DailyTimeRecordController extends Controller
{
    public function index(){
        $dtrs = DailyTimeRecord::all();
        return view('admin.daily_time_records.index',compact('dtrs'));
    }

    public function upload(Request $request){
        $file = $request->file('dtr_file');

        $this->move_file($file);

        $this->import_to_db($file);

        return redirect('/daily_time_records');

    }


    public function move_file($file){
        $destinationPath = base_path().'/storage/dtr_upload';
        $file->move($destinationPath,$file->getClientOriginalName());
    }

    public function import_to_db($file){
        $storage_path = base_path().'/storage/dtr_upload';

        if(($handle = fopen($storage_path.'/'.$file->getClientOriginalName(),'r')) !== false  ){
            while(($data= fgetcsv($handle,100000,"\t")) !== false){
                $this->store_to_db($data);
            }
        }
    }

    public function store_to_db($data){
        $dtr = new DailyTimeRecord();
        $dtr->operator_no = substr($data[0],0,3);
        $dtr->dtr_date = substr($data[0],27,4).'-'.substr($data[0],21,2).'-'.substr($data[0],24,2); //2018-09-22
        $dtr->dtr_time = substr($data[0],31,9);
        $dtr->dtr_code = substr($data[0],41,1);
        $dtr->device_id = substr($data[0],43,1);
        $dtr->remarks = "";
        $dtr->save();
    }

    public function test(){
        $sql = "select id,operator_no,dtr_date,
                MIN((select dtr_time from daily_time_records as tin where dtr_code = 1 and tin.operator_no = tl.operator_no and (tin.dtr_time = tl.dtr_time))) as time_in,
                MAX((select dtr_time from daily_time_records as tout where dtr_code = 2 and tout.operator_no = tl.operator_no and (tout.dtr_time = tl.dtr_time))) as time_out
                from daily_time_records as tl
                group by operator_no,dtr_date";






        if($request->user_id == '' ){
            $sql .= " where (production_date BETWEEN :date_from AND :date_to) group by operator_id,production_date order by operator_id";
            $biometrics = DB::select(DB::raw($sql),
                array('date_from' => str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),'date_to'=>str_to_carbon($request->date_to,'m/d/Y')->endOfDay()));
        }else {
            $sql .= " where (production_date BETWEEN :date_from AND :date_to) AND operator_id = :operator_id group by operator_id,production_date order by operator_id";
            $biometrics = DB::select(DB::raw("$sql"),
                array('date_from' => str_to_carbon($request->date_from,'m/d/Y')->startOfDay(),'date_to' => str_to_carbon($request->date_to,'m/d/Y')->endOfDay(),'operator_id' => $request->user_id)
            );
        }
        return view("admin.attendance.timeinout",compact('biometrics'));
    }





}
