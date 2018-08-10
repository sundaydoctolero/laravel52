<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;
use App\User;
use App\Http\Requests\DownloadRequest;

use App\Http\Requests\OutputRequest;
use App\Output;
use App\Logsheet;
use DB;
use Response;

class AgentOutputController extends Controller
{
    public $view_path = 'agent.outputs';

    public $url_path = '/agent/outputs';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $downloads = Download::where('status','For Output')->get();
        $downloads->load('publication');
        return view($this->view_path.'.index',compact('downloads'));
    }

    public function edit(Download $download){
        //$download->lockForUpdate()->get(); //database level
        $outputs = Output::where('download_id',$download->id)->get();

        $sql = "select id,state,
                (select sum(records) from log_sheets as sale where download_id = tl.download_id and sale.state = tl.state and sale_rent = 'Sale' group by state,sale_rent) as sale,
                (select sum(records) from log_sheets as sale where download_id = tl.download_id and sale.state = tl.state and sale_rent = 'Rent' group by state,sale_rent) as rent,
                sum(records) as total
                from log_sheets as tl
                where download_id = :download_id
                group by state";

        $records = DB::select(DB::raw($sql),array('download_id'=>$download->id));

        return view($this->view_path.'.edit',compact('download','outputs','records'));
    }

    public function update(Download $download){

        $output_records = DB::table('outputs')
            ->select(DB::raw('SUM(sale_records) + SUM(rent_records) as sale'))
            ->where('download_id',$download->id)
            ->get();

        $log_sheet_records = DB::table('log_sheets')
            ->select(DB::raw('SUM(records) as sale'))
            ->where('download_id',$download->id)
            ->get();

        if($output_records == $log_sheet_records){
            $download->update(['status'=>'Closed']);
            return redirect($this->url_path);
        } else {
            flash()->message('Output Records does not match with Log sheet records')->warning()->important();
            return redirect()->back();
        }


    }

    public function edit_output(Output $output){
        return \Response::json($output);
    }

    public function store_output(Download $download,Request $request){


        $total = $request->sale_records + $request->rent_records;

        if($request->sequence_to == 0 AND $request->sequence_to == 0){
            $sequence = 0;
        } else {
            $sequence = ($request->sequence_to - $request->sequence_from) + 1;
        }


        if($total == $sequence){
            $download->output()->create($request->all() + ['user_id'=>auth()->user()->id]);
        } else {
            flash()->message('Total records does not matched with sequence number')->warning()->important();
        }

        return redirect()->back();
    }

    public function update_output(Output $output,Request $request){
        $output->update($request->all());
        return redirect()->back();
    }

    public function log_sheet(Download $download){

        $records =  DB::table('log_sheets')
            ->where('download_id',$download->id)
            ->select('state','sale_rent','records', DB::raw('SUM(records) as total_records'))
            ->groupBy('state')
            ->groupBy('sale_rent')
            ->get();

        return $records;

        return \Response::json($records);

    }

    public function modify_log(LogSheet $log_sheet,Request $request){
        $log_sheet->update($request->all());
        return redirect()->back();
    }

}
