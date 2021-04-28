<?php

declare(strict_types=1);

namespace Src\Magnitude\Infrastructure\Repositories;

use Src\Magnitude\Domain\Contracts\MagnitudeRepository;
use Src\Magnitude\Domain\Magnitude;
use Src\Magnitude\Domain\ValueObjects\MagnitudeId;
use Src\Magnitude\Domain\ValueObjects\MagnitudeName;
use App\Models\Magnitude as EloquentMagnitudeModel;

class EloquentMagnitudeRepository implements MagnitudeRepository
{
    private $eloquentMagnitudeModel;

    public function __construct()
    {
        $this->eloquentMagnitudeModel = new EloquentMagnitudeModel;
    }

    public function find(MagnitudeId $id): ?Magnitude
    {
        $magnitude = $this->eloquentMagnitudeModel->findOrFail($id->value());

        return new Magnitude(
            new MagnitudeName($magnitude->name)
        );
    }

    public function findByCriteria(MagnitudeName $name): ?Magnitude
    {
        $magnitude = $this->eloquentMagnitudeModel
            ->where('name', $name->value())
            ->firstOrFail();

        return new Magnitude(
            new MagnitudeName($magnitude->name)
        );
    }

    public function save(Magnitude $magnitude): void
    {
        $data = [
            'name' => $magnitude->name()->value()
        ];

        $this->eloquentMagnitudeModel->create($data);
    }

    public function update(MagnitudeId $id, Magnitude $magnitude): void
    {
        $data = [
            'name' => $magnitude->name()->value()
        ];

        $this->eloquentMagnitudeModel
            ->findOrFail($id->value())
            ->update($data);
    }

    public function delete(MagnitudeId $id): void
    {
        $this->eloquentMagnitudeModel
            ->findOrFail($id->value())
            ->delete();
    }

}
