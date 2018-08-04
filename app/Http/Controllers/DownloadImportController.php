<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;
use App\Publication;
use App\Download;
use App\Output;
use Mail;
use Swift_SmtpTransport;

class DownloadImportController extends Controller
{
    public function import_downloads(){
        $today = Carbon::now();
        /**
         * Check first if imports already run!!
         */

        $check = Download::where('publication_date',$today->toDateString())->get();

        if($check->count() > 0){
            flash('Batch Imports already Run!!')->warning();
            return redirect()->back();
        }


        $this->import_quarterly();
        $this->import_publications_monthly();
        $this->import_bi_weekly();
        $this->import_weekly_weekly_advance_daily();

        //$this->sendEmail();

        flash('Batch Imports successful!!')->success();
        return redirect()->back();
    }

    public function import_weekly_weekly_advance_daily(){
        $today = Carbon::now();
        $advance = Carbon::now()->addDays(7);

        $publications =  Publication::whereIn('issue',['Weekly','Weekly - Advance','Daily'])
            ->whereHas('days',function ($query) use ($today) {
                $query->where('day_name',$today->format('l'));
            })->with('days')->get();


        foreach($publications as $publication){
            $download = new Download();
            $download->publication_id = $publication->id;

            if($publication->issue == 'Weekly - Advance'){
                $download->publication_date = $advance->toDateString();
            } else {
                $download->publication_date = $today->toDateString();
            }
            $download->no_of_batches = $publication->default_batch;

            if($publication->publication_type == 'Direct Capture'){
                $download->status = 'For Entry';
                /**
                 * sync offline code here
                 */
            } else {
                $download->status = 'For Download';
            }

            $download->save();
            $download->output()->save(new Output());
        }

    }

    public function import_publications_monthly(){
        $today = Carbon::now();

        if($today->day == 1){
            $publications =  Publication::whereIn('issue',['Monthly'])
                ->whereHas('days',function ($query) {
                $query->where('day_name','Monthly');
            })->with('days')->get();

            foreach($publications as $publication){
                $download = new Download();
                $download->publication_id = $publication->id;
                $download->publication_date = $today->toDateString();
                $download->no_of_batches = $publication->default_batch;

                if($publication->publication_type == 'Direct Capture'){
                    $download->status = 'For Entry';
                    /**
                     * sync offline code here
                     */
                } else {
                    $download->status = 'For Download';
                }

                $download->save();
                $download->output()->save(new Output());
            }
        }

    }

    public function import_bi_weekly(){
        $today = Carbon::now();
        $advance = Carbon::now()->addDays(14);

        if($today->weekOfYear % 2 == 0){
            $issue = ['Bi-Weekly Even','Bi-Weekly Advance Even'];
        } else {
            $issue = ['Bi-Weekly Odd','Bi-Weekly Advance Odd'];
        }

        $publications =  Publication::whereIn('issue',$issue)
            ->whereHas('days',function ($query) use ($today) {
            $query->where('day_name',$today->format('l'));
        })->with('days')->get();


        foreach($publications as $publication){
            $download = new Download();
            $download->publication_id = $publication->id;

            if($publication->issue == 'Bi-Weekly Even'){
                $download->publication_date = $today->toDateString();
            } elseif($publication->issue == 'Bi-Weekly Advance Even'){
                $download->publication_date = $advance->toDateString();
            } elseif($publication->issue == 'Bi-Weekly Advance Odd'){
                $download->publication_date = $advance->toDateString();
            } else {
                $download->publication_date = $today->toDateString();
            }

            $download->no_of_batches = $publication->default_batch;

            if($publication->publication_type == 'Direct Capture'){
                $download->status = 'For Entry';
                /**
                 * sync offline code here
                 */
            } else {
                $download->status = 'For Download';
            }

            $download->save();
            $download->output()->save(new Output());
        }
    }

    public function import_quarterly(){
        $today = Carbon::now();

        $publications =  Publication::whereIn('issue',['Quarterly'])
            ->whereHas('days',function ($query) use ($today){
                if($today->toDateString() == '2018-03-01'){
                    $query->where('day_name','Autumn');
                }elseif($today->toDateString() == '2018-06-01'){
                    $query->where('day_name','Winter');
                }elseif($today->toDateString() == '2018-09-01'){
                    $query->where('day_name','Spring');
                }elseif($today->toDateString() == '2018-12-01'){
                    $query->where('day_name','Summer');
                }else{
                    $query->where('day_name','xxxxx');
                }
            })->with('days')->get();

        foreach($publications as $publication){
            $download = new Download();
            $download->publication_id = $publication->id;
            $download->publication_date = $today->toDateString();
            $download->no_of_batches = $publication->default_batch;

            if($publication->publication_type == 'Direct Capture'){
                $download->status = 'For Entry';
                /**
                 * sync offline code here
                 */
            } else {
                $download->status = 'For Download';
            }

            $download->save();
            $download->output()->save(new Output());
        }
    }

    public function import_fortnightly(){

    }

    public function sendEmail(){
        $publications = Publication::first();

        Mail::send(['html'=>'mail.autoimport'],
            ['data'=>$publications],
            function($message){
                $message->to('sundaydoctolero2010@gmail.com','CCC Data Management Services Inc.')
                    ->subject('Publication Import '.Carbon::today()->toDateString());
            });
    }
}
