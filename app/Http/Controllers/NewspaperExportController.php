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
        $this->middleware('admin');
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

        $closed = Download::where('status','Closed')
            ->whereHas('output',function($q) use ($request){
            $q->where('output_date',$request->output_date)
                ->where('delivery_time',$request->delivery_time);
        })->orderBy('updated_at')->get();


        $outputs = Output::where('output_date',$request->output_date)
            ->orderBy('sequence_from')->get();


        //return $outputs->load('download.publication');


        $closed->load(['log_sheet' => function($query){
            $query->groupBy('download_id','state')->get();
        }]);

        $filename = 'publication details.txt';

        $file = fopen('publication details.txt','w+');


        $y = 0;
        foreach($outputs as $output){

            $logsheets = Logsheet::where('download_id',$output->download->id)
                        ->groupBy('download_id','state')->get();
            foreach($logsheets as $logsheet) {
                $y++;
                fwrite($file,'Publication Name: '.$logsheet->state.'_'.str_replace(' ','_',strtoupper($output->download->publication->publication_name))."\r\n");
                fwrite($file,'Publication Date: '.$output->download->publication_date."\r\n");
                fwrite($file,'Publication State: '.$logsheet->state."\r\n\r\n");

            }
        }

        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,"\t\t\t".'Total Publications : '.$y."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");

        fclose($file);

        $headers = array('Content-Type' => 'text/csv');
        return response()->download('publication details.txt',$filename,$headers);




















        $x = 0;
        foreach($closed as $close){
            foreach($close->log_sheet as $state){
                $x++;
                fwrite($file,'Publication Name: '.$state->state.'_'.str_replace(' ','_',strtoupper($close->publication->publication_name))."\r\n");
                fwrite($file,'Publication Date: '.$close->publication_date."\r\n");
                fwrite($file,'Publication State: '.$state->state."\r\n\r\n");
            }
        }

        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,"\t\t\t".'Total Publications : '.$x."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");
        fwrite($file,'------------------------------------------------------------------------------------'."\r\n");

        fclose($file);

        $headers = array('Content-Type' => 'text/csv');
        return response()->download('publication details.txt',$filename,$headers);
    }








}
