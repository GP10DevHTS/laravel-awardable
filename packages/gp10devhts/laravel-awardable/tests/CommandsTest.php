<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

uses(Gp10devhts\Awardable\Tests\TestCase::class);

it('can publish the package assets', function () {
    Artisan::call('awardable:publish');
    expect(File::exists(config_path('awardable.php')))->toBeTrue();
});

it('can seed the award categories', function () {
    Artisan::call('awardable:seed-categories');
    $this->assertDatabaseHas('award_categories', ['slug' => 'best-speaker']);
});
