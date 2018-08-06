<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Download;
use Mail;
use Carbon\Carbon;

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

        Mail::send(['html'=>'mail.not_updated'],
            ['downloads'=>$downloads],
            function($message){
                $message->to(['sysadmin@cccdms.com','ccc.news@cccdms.com','garrys@cccdms.com','tessb@cccdms.com'],'LinkMe Systems')
                    ->subject('Not Updated Report as of '.Carbon::now());
            });

        echo "Successfull!!";
    }
}
