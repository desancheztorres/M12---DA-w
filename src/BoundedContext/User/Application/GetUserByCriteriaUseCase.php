<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application;

use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserLastname;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;

final class GetUserByCriteriaUseCase {
    private $repository;

    /**
     * GetUserByCriteriaUseCase constructor.
     * @param UserRepositoryContract $repository
     */
    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $userName
     * @param string $userLastname
     * @param string $userEmail
     * @return User
     */
    public function __invoke(string $userName, string $userLastname, string $userEmail): User
    {
        $name = new UserName($userName);
        $lastname = new UserLastname($userLastname);
        $email = new UserEmail($userEmail);

        return $this->repository->findByCriteria($name, $lastname, $email);
    }
}
