<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Download;
use Mail;
use Carbon\Carbon;
use App\Output;

class SendNotUpdated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:not_updated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Email Not Updated Publications';

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
        $downloads = Download::whereIn('status',['For Download','Not Updated','For Query','Pending'])->orderBy('status')->orderBy('publication_date')->get();
        $downloads->load('publication','operator');


        $no_records = Output::where('output_date',Carbon::now()->toDateString())
            ->where('remarks','<>','Invalid')
            ->where('sale_records',0)->where('rent_records',0)
            ->get();

        $no_records->load('download.publication');

        Mail::send(['html'=>'mail.not_updated'],
            ['downloads'=>$downloads,'records'=>$no_records],
            function($message){
                $message->to(['garrys@cccdms.com','tessb@cccdms.com','sysadmin@cccdms.com','dotc@cccdms.com'],'LinkMe Systems')
                //$message->to(['sysadmin@cccdms.com'],'Link|Me Systems')
                    ->subject('Publication Report as of '.Carbon::now());
            });

        echo "Successfull!!";
    }
}
