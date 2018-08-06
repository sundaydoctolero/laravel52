<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;
use App\Publication;
use App\Download;
use App\Output;
use Mail;

class DownloadImportController extends Controller
{
    public $weekly = 0;

    public $bi_weekly = 0;

    public $quarterly = 0;

    public $monthly = 0;

    public function import_downloads()
    {

        return "Contact Administrator!!";


        $today = Carbon::now();
        $advance = Carbon::now()->addDays(7);
        $advance_two_weeks = Carbon::now()->addDays(14);

        $weekly = [];
        $monthly = [];
        $bi_weekly = [];
        $quarterly = [];
        $total = 0;

        /**
         * Import Weekly, Daily, Weekly Advance
         */
        $publications =  Publication::whereIn('issue',['Weekly','Weekly - Advance','Daily'])
            ->whereHas('days',function ($query) use ($today) {
                $query->where('day_name',$today->format('l'));
            })->with('days')->orderBy('issue')->orderBy('publication_type')->get();

        $weekly = $publications;

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

        /**
         * Import Monthly
         */

        if($today->day == 1){
            $publications =  Publication::whereIn('issue',['Monthly'])
                ->whereHas('days',function ($query) {
                    $query->where('day_name','Monthly');
                })->with('days')->orderBy('issue')->orderBy('publication_type')->get();

            $monthly = $publications;

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

        /**
         * Import Quarterly
         */
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
            })->with('days')->orderBy('issue')->orderBy('publication_type')->get();

        $quarterly = $publications;

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

        /**
         * Import Bi-Weekly
         */
        if($today->weekOfYear % 2 == 0){
            $issue = ['Bi-Weekly Even','Bi-Weekly Advance Even'];
        } else {
            $issue = ['Bi-Weekly Odd','Bi-Weekly Advance Odd'];
        }

        $publications =  Publication::whereIn('issue',$issue)
            ->whereHas('days',function ($query) use ($today) {
                $query->where('day_name',$today->format('l'));
            })->with('days')->orderBy('issue')->orderBy('publication_type')->get();

        $bi_weekly = $publications;

        foreach($publications as $publication){
            $download = new Download();
            $download->publication_id = $publication->id;

            if($publication->issue == 'Bi-Weekly Even'){
                $download->publication_date = $today->toDateString();
            } elseif($publication->issue == 'Bi-Weekly Advance Even'){
                $download->publication_date = $advance_two_weeks->toDateString();
            } elseif($publication->issue == 'Bi-Weekly Advance Odd'){
                $download->publication_date = $advance_two_weeks->toDateString();
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

        if($weekly){
            $weekly->load(['downloads' => function($query) use($today,$advance){
                $query->latest();
            }]);
            $total += $weekly->count();
        }
        if($monthly){
            $monthly->load(['downloads' => function($query) use($today,$advance){
                $query->latest();
            }]);
            $total += $monthly->count();
        }
        if($bi_weekly){
            $bi_weekly->load(['downloads' => function($query) use($today,$advance){
                $query->latest();
            }]);
            $total += $bi_weekly->count();
        }
        if($quarterly){
            $quarterly->load(['downloads' => function($query) use($today,$advance){
                $query->latest();
            }]);
            $total += $quarterly->count();
        }


        /**
         * Sends Email
         */
        Mail::send(['html'=>'mail.autoimport'],
            ['data'=>$publications,'weekly'=>$weekly,'monthly'=>$monthly,'bi_weekly'=>$bi_weekly,'quarterly'=>$quarterly,'total'=>$total,'today'=>$today],
            function($message) use ($today){
                $message->to('sysadmin@cccdms.com','LinkMe Systems')
                    ->subject('Publication Import '.$today->toDateString());
            });

        Mail::send(['html'=>'mail.autoimport'],
            ['data'=>$publications,'weekly'=>$weekly,'monthly'=>$monthly,'bi_weekly'=>$bi_weekly,'quarterly'=>$quarterly,'total'=>$total,'today'=>$today],
            function($message) use ($today){
                $message->to('garrys@cccdms.com','LinkMe Systems')
                    ->subject('Publication Import '.$today->toDateString());
            });

        echo "successful!!".$today;
    }


    public function import_download(){
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


        $total = $this->weekly + $this->monthly + $this->bi_weekly + $this->quarterly;

        $this->sendEmail($this->weekly,$this->monthly,$this->bi_weekly,$this->quarterly,$total);


        flash('Batch Imports successful!!<br>'.'Weekly : '.$this->weekly.'<br>Bi-Weekly : '.$this->bi_weekly.'<br>Quarterly : '.$this->quarterly.'<br>Monthly : '.$this->monthly.'<br>Total : '.$total)->success();
        return redirect()->back();
    }

    public function import_weekly_weekly_advance_daily(){
        $today = Carbon::now();
        $advance = Carbon::now()->addDays(7);

        $publications =  Publication::whereIn('issue',['Weekly','Weekly - Advance','Daily'])
            ->whereHas('days',function ($query) use ($today) {
                $query->where('day_name',$today->format('l'));
            })->with('days')->get();

        $this->weekly = $publications->count();

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

            $this->monthly = $publications->count();

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
        $advance_two_weeks = Carbon::now()->addDays(14);

        if($today->weekOfYear % 2 == 0){
            $issue = ['Bi-Weekly Even','Bi-Weekly Advance Even'];
        } else {
            $issue = ['Bi-Weekly Odd','Bi-Weekly Advance Odd'];
        }

        $publications =  Publication::whereIn('issue',$issue)
            ->whereHas('days',function ($query) use ($today) {
            $query->where('day_name',$today->format('l'));
        })->with('days')->get();

        $this->bi_weekly = $publications->count();

        foreach($publications as $publication){
            $download = new Download();
            $download->publication_id = $publication->id;

            if($publication->issue == 'Bi-Weekly Even'){
                $download->publication_date = $today->toDateString();
            } elseif($publication->issue == 'Bi-Weekly Advance Even'){
                $download->publication_date = $advance_two_weeks->toDateString();
            } elseif($publication->issue == 'Bi-Weekly Advance Odd'){
                $download->publication_date = $advance_two_weeks->toDateString();
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

        $this->quarterly = $publications->count();

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
        $publications = 1;
        Mail::send(['html'=>'mail.autoimport'],
            ['data'=>$publications,'today'=>Carbon::now()],
            function($message){
                $message->to('sysadmin@cccdms.com','CCC Data Management Services Inc.')
                    ->subject('Publication Import '.Carbon::today()->toDateString());
        });
    }
}
