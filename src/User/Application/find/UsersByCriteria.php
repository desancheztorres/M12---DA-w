<?php

declare(strict_types=1);

namespace Src\User\Application\find;

use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\User;
use Src\User\Domain\ValueObjects\UserEmail;
use Src\User\Domain\ValueObjects\UserLastname;
use Src\User\Domain\ValueObjects\UserName;

final class UsersByCriteria {
    private $repository;

    /**
     * UsersByCriteria constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
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
