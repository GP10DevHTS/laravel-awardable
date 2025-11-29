<?php

namespace Gp10devhts\Awardable\Commands;

use Gp10devhts\Awardable\Database\Seeders\AwardCategorySeeder;
use Illuminate\Console\Command;

class SeedCategoriesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'awardable:seed-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the award categories into the database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('db:seed', [
            '--class' => AwardCategorySeeder::class,
        ]);
    }
}
