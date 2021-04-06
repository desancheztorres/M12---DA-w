<?php

declare(strict_types=1);

namespace Src\User\Application\update;

use Src\User\Domain\Contracts\UserRepository;
use DateTime;
use Src\User\Domain\User;
use Src\User\Domain\ValueObjects\UserEmail;
use Src\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\User\Domain\ValueObjects\UserId;
use Src\User\Domain\ValueObjects\UserLastname;
use Src\User\Domain\ValueObjects\UserName;
use Src\User\Domain\ValueObjects\UserPassword;
use Src\User\Domain\ValueObjects\UserRememberToken;

final class UsersUpdate {

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UsersUpdate constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $userId
     * @param string $userName
     * @param string $userLastname
     * @param string $userEmail
     * @param string $userPassword
     * @param DateTime|null $userEmailVerifiedDate
     * @param string|null $userRememberToken
     */
    public function __invoke(
        int $userId,
        string $userName,
        string $userLastname,
        string $userEmail,
        string $userPassword,
        ?DateTime $userEmailVerifiedDate,
        ?string $userRememberToken
    )
    {
        $id = new UserId($userId);
        $name = new UserName($userName);
        $lastname = new UserLastname($userLastname);
        $email = new UserEmail($userEmail);
        $password = new UserPassword($userPassword);
        $emailVerifiedDate = new UserEmailVerifiedDate($userEmailVerifiedDate);
        $rememberToken = new UserRememberToken($userRememberToken);

        $user = User::create($name, $lastname, $email, $password, $emailVerifiedDate, $rememberToken);

        $this->repository->update($id, $user);
    }
}
