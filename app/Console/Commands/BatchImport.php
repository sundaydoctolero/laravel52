<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Download;
use App\Publication;
use App\Output;

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

        $check = Download::where('publication_date',$today->toDateString())->get();

        if($check->count() > 0){
            echo "failed";
        } else {
            $publications =  Publication::whereHas('days',function ($query) use ($today) {
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
                $download->status = 'For Download';
                $download->save();
                $download->output()->save(new Output());
            }

            if(Carbon::now()->day == 1){
                $publications =  Publication::whereHas('days',function ($query) {
                    $query->where('day_name','Monthly');
                })->with('days')->get();

                foreach($publications as $publication){
                    $download = new Download();
                    $download->publication_id = $publication->id;
                    $download->publication_date = Carbon::now()->toDateString();
                    $download->no_of_batches = $publication->default_batch;
                    $download->status = 'For Download';
                    $download->save();
                    $download->output()->save(new Output());
                }
            }

            echo "successful!!";

        }

    }
}
