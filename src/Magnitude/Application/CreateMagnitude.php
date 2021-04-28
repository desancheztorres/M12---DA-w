<?php

declare(strict_types=1);

namespace Src\Magnitude\Application;

use Src\Magnitude\Domain\Contracts\MagnitudeRepository;
use Src\Magnitude\Domain\Magnitude;
use Src\Magnitude\Domain\ValueObjects\MagnitudeName;

class CreateMagnitude
{
    private $repository;

    /**
     * CreateMagnitude constructor.
     *
     * @param \Src\Magnitude\Domain\Contracts\MagnitudeRepository $repository
     */
    public function __construct(MagnitudeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $magnitudeName
    ): void
    {
        $name = new MagnitudeName($magnitudeName);

        $magnitude = Magnitude::create($name);

        $this->repository->save($magnitude);

    }

}
