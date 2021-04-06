<?php

declare(strict_types=1);

namespace Src\User\Application\create;

use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\User;
use Src\User\Domain\ValueObjects\UserEmail;
use Src\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\User\Domain\ValueObjects\UserLastname;
use Src\User\Domain\ValueObjects\UserName;
use Src\User\Domain\ValueObjects\UserPassword;
use Src\User\Domain\ValueObjects\UserRememberToken;
use DateTime;

final class UsersCreate {

    /**
     * @var \Src\User\Domain\Contracts\UserRepository
     */
    private $repository;

    /**
     * UsersCreate constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string         $userName
     * @param string         $userLastname
     * @param string         $userEmail
     * @param string         $userPassword
     * @param \DateTime|null $userEmailVerifiedDate
     * @param string|null    $userRememberToken
     */
    public function __invoke(
        string $userName,
        string $userLastname,
        string $userEmail,
        string $userPassword,
        ?DateTime $userEmailVerifiedDate,
        ?string $userRememberToken
    ): void
    {
        $name = new UserName($userName);
        $lastname = new UserLastname($userLastname);
        $email = new UserEmail($userEmail);
        $password = new UserPassword($userPassword);
        $emailVerifiedDate = new UserEmailVerifiedDate($userEmailVerifiedDate);
        $rememberToken = new UserRememberToken($userRememberToken);

        $user = User::create($name, $lastname, $email, $password, $emailVerifiedDate, $rememberToken);

        $this->repository->save($user);
    }

}
