<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application;

use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;

final class GetUserUseCase {
    private $repository;

    /**
     * GetUserUseCase constructor.
     * @param UserRepositoryContract $repository
     */
    public function __construct(UserRepositoryContract $repository)
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
