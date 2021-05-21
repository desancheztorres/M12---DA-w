<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeImage extends Model
{
    use HasFactory;

    public function recipes(): belongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
