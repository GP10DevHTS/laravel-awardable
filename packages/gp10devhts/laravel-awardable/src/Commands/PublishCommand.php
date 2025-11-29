<?php

namespace Gp10devhts\Awardable\Commands;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'awardable:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all of the awardable resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', [
            '--provider' => 'Gp10devhts\\Awardable\\AwardableServiceProvider',
            '--tag' => ['config', 'migrations', 'seeders'],
        ]);
    }
}
