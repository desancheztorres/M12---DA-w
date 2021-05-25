<?php

namespace App\Models;

use App\Filters\Recipe\RecipeFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Recipe extends Model
{

    use HasFactory;

    public function scopeFilter(Builder $builder, Request $request, array $filters = []): Builder
    {
        return (new RecipeFilters($request))->add($filters)->filter($builder);
    }


    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity');
    }

    public function images(): HasMany
    {
        return $this->hasMany(RecipeImage::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }

}
