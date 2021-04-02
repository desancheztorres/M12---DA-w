<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Domain\ValueObjects;

use DateTime;

class UserEmailVerifiedDate {
    private $value;

    /**
     * UserEmailVerifiedDate constructor.
     * @param DateTime|null $emailVerifiedDate
     */
    public function __construct(?DateTime $emailVerifiedDate)
    {
        $this->value = $emailVerifiedDate;
    }

    /**
     * @return DateTime|null
     */
    public function value(): ?DateTime {
        return $this->value;
    }
}
