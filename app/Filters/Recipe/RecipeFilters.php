<?php

namespace App\Filters\Recipe;

use App\Filters\FiltersAbstract;

class RecipeFilters extends FiltersAbstract {

    protected $filters = [
        'level' => LevelFilter::class,
    ];

}
