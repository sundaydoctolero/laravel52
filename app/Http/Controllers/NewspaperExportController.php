<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Excel;
use App\Download;
use Carbon\Carbon;
use App\Output;
use App\Logsheet;

class NewspaperExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin',['except'=>'generate_pub_details']);
    }

    public function export_not_updated(Request $request){
        $downloads = Download::select('id','publication_id','publication_date','status','remarks','checked_by')
            ->whereIn('status',$request->filter_list)->get();

        Excel::create('Filename', function($excel) use($downloads) {

            $excel->sheet('Sheetname', function($sheet) use($downloads) {
                $sheet->mergeCells('A1:F1');
                $sheet->cell('A1', function($cell) {
                    $cell->setValue('CCC Data Management Services Inc.');
                    $cell->setFont(array(
                        'size'       => '20',
                        'bold'       =>  true));
                    $cell->setValignment('center');
                    $cell->setAlignment('center');
                });
                $sheet->mergeCells('A2:F2');
                $sheet->mergeCells('A3:F3');
                $sheet->cell('A3', function($cell) {
                    $cell->setValue('Not Updated Report');
                    $cell->setFont(array(
                        'size'       => '18',
                        'bold'       =>  true));
                    $cell->setValignment('center');
                    $cell->setAlignment('center');

                });
                $sheet->mergeCells('A4:F4');
                $sheet->mergeCells('A5:F5');
                $sheet->cell('A4', function($cell) {
                    $cell->setValue('as of : '.Carbon::now());
                    $cell->setFontSize(14);
                    $cell->setValignment('center');
                    $cell->setAlignment('center');

                });

                $sheet->row(6,array('ID','Publication Name','Publication Date','Status','Remarks','Check By'));
                $sheet->cell('A6:F6', function($cell) {
                    $cell->setFont(array(
                        'size'       => '12',
                        'bold'       =>  true));
                    $cell->setValignment('center');
                    $cell->setAlignment('center');

                });

                $sheet->fromArray($downloads,"'",'A7',false,false);

                $sheet->cell('A7:F1000', function($cell) {
                    $cell->setFont(array(
                        'size'    => '12'));
                    $cell->setValignment('center');
                    $cell->setAlignment('center');

                });

            });
        })->export('xls');
    }

    public function copy(){
        $downloads = Download::select('id','publication_id','publication_date','status','remarks','checked_by')->get();

        Excel::create('Filename', function($excel) use($downloads) {

            $excel->sheet('Sheetname', function($sheet) use($downloads) {
                $sheet->mergeCells('A1:F1','A3:F3');
                $sheet->cell('A1', function($cell) {
                    $cell->setValue('CCC Data Management Services Inc.');
                    $cell->setFont(array(
                        'size'       => '20',
                        'bold'       =>  true));
                    $cell->setValignment('center');
                    $cell->setAlignment('center');
                });
                $sheet->mergeCells('A2:F2');
                $sheet->mergeCells('A3:F3');
                $sheet->cell('A3', function($cell) {
                    $cell->setValue('Not Updated Report');
                    $cell->setFont(array(
                        'size'       => '18',
                        'bold'       =>  true));
                    $cell->setValignment('center');
                    $cell->setAlignment('center');

                });
                $sheet->mergeCells('A4:F4');
                $sheet->mergeCells('A5:F5');
                $sheet->cell('A4', function($cell) {
                    $cell->setValue('as of : '.Carbon::now());
                    $cell->setFontSize(14);
                    $cell->setValignment('center');
                    $cell->setAlignment('center');

                });

                $sheet->row(6,array('ID','Publication Name','Publication Date','Status','Remarks','Check By'));
                $sheet->cell('A6:F6', function($cell) {
                    $cell->setFont(array(
                        'size'       => '12',
                        'bold'       =>  true));
                    $cell->setValignment('center');
                    $cell->setAlignment('center');

                });

                $sheet->fromArray($downloads,"'",'A7',false,false);
                $sheet->cell('A7:F1000', function($cell) {
                    $cell->setFont(array(
                        'size'    => '12'));
                    $cell->setValignment('center');
                    $cell->setAlignment('center');

                });

            });


        })->export('xls');
    }

    public function generate_pub_details(Request $request){

        if($request->date_from == "" AND $request->delivery_time == ""){
            $downloads = Download::where('status','Closed')
                ->whereHas('output',function($query){
                    $query->where('output_date',Carbon::now()->toDateString());
                })->get();
        } else {
            if($request->delivery_time == ""){
                $downloads = Download::where('status','Closed')
                    ->whereHas('output',function($query) use ($request){
                        $query->where('output_date',$request->date_from);
                    })->get();
            } else {
                $downloads = Download::where('status','Closed')
                    ->whereHas('output',function($query) use ($request){
                        $query->where('output_date',$request->date_from)->where('delivery_time',$request->delivery_time);
                    })->get();
            }

        }
        $downloads->load('publication','output');

        /**
         * Open a Text File
         */
        $filename = 'publication details.txt';
        $file = fopen('publication details.txt','w+');

        /**
         * Write on Text File
         *
         */

        foreach($downloads as $count => $delivered){
            foreach($delivered->output as $row){
                if(strtoupper($delivered->publication->publication_name) == strtoupper('Gum Tree - SR') || strtoupper($delivered->publication->publication_name) == strtoupper('Gum Tree - LAND')){
                   $pub_name = 'GUM TREE';
                } else {
                    $pub_name = $delivered->publication->publication_name;
                }
                $count++ + 1;
                fwrite($file,'Publication Name: '.$row->state.'_'.str_replace(' ','_',strtoupper($pub_name))."\r\n");
                fwrite($file,'Publication Date: '.$delivered->publication_date."\r\n");
                fwrite($file,'Publication State: '.$row->state."\r\n\r\n");
            }
        }

        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,"\t\t\t".'Total Publications : '.$count."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");




        /**
         * Close Text File
         */
         fclose($file);

        /**
         * Download Text File
         */

            $headers = array('Content-Type' => 'text/csv');
            return response()->download('publication details.txt',$filename,$headers);







        $filename = 'publication details.txt';
        $file = fopen('publication details.txt','w+');

        foreach($downloads as $count => $download){
            fwrite($file,'Publication Name: '.$download->output->first()->state.'_'.str_replace(' ','_',strtoupper($download->publication->publication_name))."\r\n");
            fwrite($file,'Publication Date: '.$download->publication_date."\r\n");
            fwrite($file,'Publication State: '.$download->output->first()->state."\r\n\r\n");
            $count++ + 1;
        }

        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,"\t\t\t".'Total Publications : '.$count."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");

        fclose($file);

        $headers = array('Content-Type' => 'text/csv');
        return response()->download('publication details.txt',$filename,$headers);

    }
}
