<?php

declare(strict_types=1);

namespace Src\User\Domain\ValueObjects;

final class UserPassword {
    private $value;

    /**
     * UserPassword constructor.
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->value = $password;
    }

    /**
     * @return string
     */
    public function value(): string {
        return $this->value;
    }

}
