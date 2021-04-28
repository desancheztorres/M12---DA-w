<?php

declare(strict_types=1);

namespace Src\Magnitude\Infrastructure;

use App\Http\Requests\Magnitudes\StoreMagnitudeRequest;
use Src\Magnitude\Application\CreateMagnitude;
use Src\Magnitude\Application\MagnitudesByCriteria;
use Src\Magnitude\Domain\Magnitude;
use Src\Magnitude\Infrastructure\Repositories\EloquentMagnitudeRepository;

class CreateMagnitudeController
{
    private $eloquentMagnitudeRepository;

    public function __construct(EloquentMagnitudeRepository $eloquentMagnitudeRepository)
    {
       $this->eloquentMagnitudeRepository = $eloquentMagnitudeRepository;
    }

    public function __invoke(StoreMagnitudeRequest $request): ?Magnitude
    {
        $magnitudeName = $request->name;

        $createMagnitude = new CreateMagnitude($this->eloquentMagnitudeRepository);
        $createMagnitude->__invoke($magnitudeName);

        $getMagnitudeByCriteria = new MagnitudesByCriteria($this->eloquentMagnitudeRepository);
        return $getMagnitudeByCriteria->__invoke($magnitudeName);
    }

}
