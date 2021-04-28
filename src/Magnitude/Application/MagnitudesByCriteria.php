<?php

declare(strict_types=1);

namespace Src\Magnitude\Application;

use Src\Magnitude\Domain\Contracts\MagnitudeRepository;
use Src\Magnitude\Domain\Magnitude;
use Src\Magnitude\Domain\ValueObjects\MagnitudeName;

class MagnitudesByCriteria
{
    private $repository;

    /**
     * MagnitudesByCriteria constructor.
     *
     * @param \Src\Magnitude\Domain\Contracts\MagnitudeRepository $repository
     */
    public function __construct(MagnitudeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $magnitudeName): ?Magnitude
    {
        $name = new MagnitudeName($magnitudeName);

        return $this->repository->findByCriteria($name);
    }

}
