<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Download;
use App\Publication;
use App\Output;
use Mail;

class BatchImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bath import automation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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
                    $message->to(['sysadmin@cccdms.com','garrys@cccdms.com','ccc.news@cccdms.com','tessb@cccdms.com'],'LinkMe Systems')
                        ->subject('Publication Import '.$today->toDateString());
                });
        
            echo "successful!!".$today;
    }
}
