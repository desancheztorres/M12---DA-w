<?php

declare(strict_types=1);

namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

abstract class FilterAbstract
{

    public function mappings()
    {
        return [];
    }

    abstract public function filter(Builder $builder, $value);

    protected function resolveFilterValue($key)
    {
        return Arr::get($this->mappings(), $key);
    }

    protected function resolveOrderDirection($direction)
    {
        return Arr::get(
            [
                'desc' => 'desc',
                'asc'  => 'asc',
            ],
            $direction,
            'desc'
        );
    }

}
