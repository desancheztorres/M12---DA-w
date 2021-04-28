<?php

declare(strict_types=1);

namespace Src\Pantry\Domain;

use Src\User\Domain\ValueObjects\UserId;

class Pantry
{
    private $userId;

    /**
     * Pantry constructor.
     *
     * @param \Src\User\Domain\ValueObjects\UserId $userId
     */
    public function __construct(UserId $userId)
    {
        $this->userId = $userId;
    }

    public function userId(): UserId {
        return $this->userId;
    }

    /**
     * @param \Src\User\Domain\ValueObjects\UserId $userId
     *
     * @return \Src\Pantry\Domain\Pantry
     */
    public static function create(
        UserId $userId
    ): Pantry {
        return new self($userId);
    }

}
