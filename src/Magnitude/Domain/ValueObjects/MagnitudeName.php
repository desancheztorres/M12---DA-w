<?php

declare(strict_types=1);

namespace Src\Magnitude\Domain\ValueObjects;

final class MagnitudeName
{
    private $value;

    /**
     * MagnitudeName constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->value = $name;
    }

    /**
     * @return string
     */
    public function value(): string {
        return $this->value;
    }

}
