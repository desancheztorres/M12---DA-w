<?php

declare(strict_types=1);

namespace App\Filters\Recipe;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

final class TimeFilter extends FilterAbstract
{

    public function filter(Builder $builder, $value): Builder
    {
        return $builder->where('time', '<=', $value);
    }

}
