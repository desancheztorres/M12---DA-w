<?php

declare(strict_types=1);

namespace App\Http\Controllers\magnitudes;

use App\Http\Requests\Magnitudes\StoreMagnitudeRequest;
use App\Http\Resources\Magnitude;

class CreateMagnitudeController
{
    private $createMagnitudeController;

    public function __construct(\Src\Magnitude\Infrastructure\CreateMagnitudeController $createMagnitudeController)
    {
        $this->createMagnitudeController = $createMagnitudeController;
    }

    public function __invoke(StoreMagnitudeRequest $request)
    {
        $magnitude = new Magnitude($this->createMagnitudeController->__invoke($request));

        return response($magnitude, 201);
    }

}
