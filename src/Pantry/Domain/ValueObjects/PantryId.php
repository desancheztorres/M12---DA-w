<?php

declare(strict_types=1);

namespace Src\Pantry\Domain\ValueObjects;

use InvalidArgumentException;

final class PantryId
{

    private $value;

    /**
     * PantryId constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->validate($id);
        $this->value = $id;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }

    private function validate(int $id): void
    {
        $options = [
            'options' => [
                'min_range' => 1
            ]
        ];

        if (! filter_var($id, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', __CLASS__, $id)
            );
        }
    }


}
