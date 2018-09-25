<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DailyTimeRecord;
use Carbon\Carbon;


class ImportDTR extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:dtr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $storage_path = 'C:/ftp/DTR';
        $file = Carbon::now()->subDay(1)->format('Ymd').'-'.Carbon::now()->subDay(1)->format('Ymd').'.txt';

        if(($handle = fopen($storage_path.'/'.$file,'r')) !== false  ){
            while(($data= fgetcsv($handle,100000,"\t")) !== false){
                $dtr = new DailyTimeRecord();
                $dtr->operator_no = substr($data[0],0,3);
                $dtr->dtr_date = substr($data[0],27,4).'-'.substr($data[0],21,2).'-'.substr($data[0],24,2); //2018-09-22
                $dtr->dtr_time = substr($data[0],31,9);
                $dtr->dtr_code = substr($data[0],41,1);
                $dtr->device_id = substr($data[0],43,1);
                $dtr->remarks = "";
                $dtr->save();
            }
        }

        echo "Success!!";
    }
}
