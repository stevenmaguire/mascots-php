<?php

namespace App\Console\Commands;

use App\Mascot;
use Illuminate\Console\Command;

class ApproveMascots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mascots:approve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Approve suggested mascots.';

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
        Mascot::unapproved()->each(function ($mascot) {
            $mascot->approve();
            $mascot->save();
        });

        $this->call('mascots:sync-search');
    }
}
