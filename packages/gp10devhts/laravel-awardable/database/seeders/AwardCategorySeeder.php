<?php

namespace Gp10devhts\Awardable\Database\Seeders;

use Gp10devhts\Awardable\Models\AwardCategory;
use Illuminate\Database\Seeder;

class AwardCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('awardable.default_categories');

        foreach ($categories as $category) {
            AwardCategory::updateOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
