<?php

namespace Gp10devhts\Awardable\Traits;

use Gp10devhts\Awardable\Models\Award;
use Gp10devhts\Awardable\Models\AwardCategory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Awardable
{
    /**
     * Get all of the model's awards.
     */
    public function awards(): MorphMany
    {
        return $this->morphMany(Award::class, 'awardable');
    }

    /**
     * Give an award to the model.
     *
     * @param string $categorySlug
     * @param array|null $meta
     * @return Award|null
     */
    public function giveAward(string $categorySlug, ?array $meta = null): ?Award
    {
        $category = AwardCategory::where('slug', $categorySlug)->first();

        if (! $category) {
            return null;
        }

        if (! config('awardable.allow_multiple_awards')) {
            if ($this->hasAward($categorySlug)) {
                return null;
            }
        }

        return $this->awards()->create([
            'award_category_id' => $category->id,
            'meta' => $meta,
        ]);
    }

    /**
     * Remove an award from the model.
     *
     * @param string $categorySlug
     * @return bool
     */
    public function removeAward(string $categorySlug): bool
    {
        $category = AwardCategory::where('slug', $categorySlug)->first();

        if (! $category) {
            return false;
        }

        return $this->awards()->where('award_category_id', $category->id)->delete();
    }

    /**
     * Check if the model has a specific award.
     *
     * @param string $categorySlug
     * @return bool
     */
    public function hasAward(string $categorySlug): bool
    {
        return $this->awards()->whereHas('category', function ($query) use ($categorySlug) {
            $query->where('slug', $categorySlug);
        })->exists();
    }

    /**
     * Get the latest awards for the model.
     *
     * @return MorphMany
     */
    public function latestAwards(): MorphMany
    {
        return $this->awards()->latest();
    }
}
