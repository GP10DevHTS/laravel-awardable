<?php

namespace Gp10devhts\Awardable\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Award extends Model
{
    use HasFactory;

    protected $fillable = [
        'award_category_id',
        'awardable_type',
        'awardable_id',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function awardable(): MorphTo
    {
        return $this->morphTo();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(AwardCategory::class, 'award_category_id');
    }
}
