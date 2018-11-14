<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Download;
use Carbon\Carbon;
use Mail;

class SendDuePublications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:due_pub';

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
        $due_date = Carbon::now()->subDays(4);

        $downloads = Download::whereIn('status',['For Entry'])
                            ->where('publication_date','<',$due_date->toDateString())
                            ->orderBy('publication_date')->get();
        Mail::send(['html'=>'mail.due_pub'],
            ['downloads'=>$downloads],
            function($message){
                    //$message->to(['garrys@cccdms.com','tessb@cccdms.com','sysadmin@cccdms.com'],'LinkMe Systems')
                    $message->to(['sysadmin@cccdms.com'],'Link|Me Systems')
                    ->subject('Publication on due '.Carbon::now()->toDateString());
            });

        echo "Successfull!!";

    }
}
