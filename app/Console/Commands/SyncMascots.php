<?php

namespace App\Console\Commands;

use App\Mascot;
use Illuminate\Console\Command;

class SyncMascots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mascots:sync-search';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync mascot models with search.';

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
        Mascot::approved()->searchable();
    }
}
