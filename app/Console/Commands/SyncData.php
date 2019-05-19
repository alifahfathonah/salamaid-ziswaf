<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\HomeController;
class SyncData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Data Dari Keuangan Sekolah Alam Bogor';

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
        $syc=new HomeController;
        $syc->sync();
    }
}
