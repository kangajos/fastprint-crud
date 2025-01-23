<?php

namespace App\Console\Commands;

use App\Jobs\SyncProductJob;
use Illuminate\Console\Command;

class SyncProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-product-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('sync product is inprogress...');
        SyncProductJob::dispatch();
        $this->info('sync product is done.');
    }
}
