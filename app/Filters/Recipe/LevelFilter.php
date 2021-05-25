<?php

declare(strict_types=1);

namespace App\Filters\Recipe;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

final class LevelFilter extends FilterAbstract
{

    public function mappings(): array
    {
        return [
            'beginner'     => 1,
            'intermediate' => 2,
            'advanced'     => 3
        ];
    }

    public function filter(Builder $builder, $value): Builder
    {
        $value = $this->resolveFilterValue($value);

        if (! isset($value)) {
            return $builder;
        }

        return $builder->where('level', $value);

    }

}
