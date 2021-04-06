<?php

declare(strict_types=1);

namespace Src\User\Domain\ValueObjects;

final class UserLastname {
    private $value;

    /**
     * UserLastname constructor.
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
