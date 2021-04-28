<?php

declare(strict_types=1);

namespace Src\Magnitude\Domain;

use Src\Magnitude\Domain\ValueObjects\MagnitudeName;

class Magnitude
{
    private $name;

    /**
     * Magnitude constructor.
     *
     * @param \Src\Magnitude\Domain\ValueObjects\MagnitudeName $name
     */
    public function __construct(MagnitudeName $name)
    {
        $this->name = $name;
    }

    public function name(): MagnitudeName {
        return $this->name;
    }

    /**
     * @param \Src\Magnitude\Domain\ValueObjects\MagnitudeName $name
     *
     * @return \Src\Magnitude\Domain\Magnitude
     */
    public static function create(MagnitudeName $name): Magnitude {
        return new self($name);
    }

}
