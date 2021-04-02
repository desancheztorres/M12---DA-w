<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Domain\ValueObjects;

final class UserRememberToken {
    private $value;

    /**
     * UserRememberToken constructor.
     * @param string|null $rememberToken
     */
    public function __construct(?string $rememberToken)
    {
        $this->value = $rememberToken;
    }

    /**
     * @return string|null
     */
    public function value(): ?string {
        return $this->value;
    }
}
