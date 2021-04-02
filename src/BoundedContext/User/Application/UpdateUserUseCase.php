<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application;

use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use DateTime;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Src\BoundedContext\User\Domain\ValueObjects\UserLastname;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Src\BoundedContext\User\Domain\ValueObjects\UserRememberToken;

final class UpdateUserUseCase {

    /**
     * @var UserRepositoryContract
     */
    private $repository;

    /**
     * UpdateUserUseCase constructor.
     * @param UserRepositoryContract $repository
     */
    public function __construct(UserRepositoryContract $repository)
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
