<?php

declare(strict_types=1);

namespace Src\Magnitude\Domain\Contracts;


use Src\Magnitude\Domain\Magnitude;
use Src\Magnitude\Domain\ValueObjects\MagnitudeId;
use Src\Magnitude\Domain\ValueObjects\MagnitudeName;

interface MagnitudeRepository
{

    public function find(MagnitudeId $id): ?Magnitude;

    public function findByCriteria(MagnitudeName $name): ?Magnitude;

    public function save(Magnitude $magnitude): void;

    public function update(MagnitudeId $id, Magnitude $magnitude): void;

    public function delete(MagnitudeId $id): void;

}
