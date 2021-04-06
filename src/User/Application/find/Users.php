<?php

declare(strict_types=1);

namespace Src\User\Application\find;

use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\User;
use Src\User\Domain\ValueObjects\UserId;

final class Users {
    private $repository;

    /**
     * Users constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $userId
     * @return User
     */
    public function __invoke(int $userId): User
    {
        $id = new UserId($userId);

        return $this->repository->find($id);
    }
}
