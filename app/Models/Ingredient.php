<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    const IMAGE_PATH = '//www.dropbox.com/s/tvv8aqv3ks6djn8/';

    public function image_path() {
        return self::IMAGE_PATH . $this->image;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'pantries')->withPivot('quantity');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function magnitude(): BelongsTo
    {
        return $this->belongsTo(Magnitude::class);
    }
}
