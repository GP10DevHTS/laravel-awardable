<?php

use Gp10devhts\Awardable\Tests\Models\User;
use Gp10devhts\Awardable\Models\AwardCategory;

uses(Gp10devhts\Awardable\Tests\TestCase::class);

beforeEach(function () {
    $this->user = User::create(['name' => 'Test User']);
    $this->awardCategory = AwardCategory::create(['name' => 'Best Speaker', 'slug' => 'best-speaker']);
});

it('can give an award to a model', function () {
    $this->user->giveAward('best-speaker');
    expect($this->user->awards()->count())->toBe(1);
});

it('can remove an award from a model', function () {
    $this->user->giveAward('best-speaker');
    $this->user->removeAward('best-speaker');
    expect($this->user->awards()->count())->toBe(0);
});

it('can check if a model has an award', function () {
    $this->user->giveAward('best-speaker');
    expect($this->user->hasAward('best-speaker'))->toBeTrue();
});

it('prevents duplicate awards when multiple awards are disabled', function () {
    config(['awardable.allow_multiple_awards' => false]);
    $this->user->giveAward('best-speaker');
    $this->user->giveAward('best-speaker');
    expect($this->user->awards()->count())->toBe(1);
});

it('returns null when giving an award with a non-existent slug', function () {
    $award = $this->user->giveAward('non-existent-slug');
    expect($award)->toBeNull();
});
