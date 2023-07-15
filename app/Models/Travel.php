<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Travel extends Model
{
    use HasFactory, HasSlug, HasUuids;

    protected $table = "travels";

    protected $fillable = [
        'is_public',
        'slug',
        'name',
        'description',
        'number_of_days',
        'number_of_nights'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * =====================
     * Relationships.
     * =====================
     */

    public function tours(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Tour::class);
    }
    public function numberOfNights(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['number_of_days'] - 1
        );
    }
}
