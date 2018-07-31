<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        //
    }
}
