<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Infrastructure\Repositories;

use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use App\Models\User as EloquentUserModel;
use Src\BoundedContext\User\Domain\ValueObjects\UserLastname;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Src\BoundedContext\User\Domain\ValueObjects\UserRememberToken;

final class EloquentUserRepository implements UserRepositoryContract {

    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }

    public function find(UserId $id): ?User
    {
        $user = $this->eloquentUserModel->firstOrFail($id->value());

        return new User(
            new UserName($user->name),
            new UserLastname($user->lastname),
            new UserEmail($user->email),
            new UserPassword($user->password),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserRememberToken($user->remember_token)
        );
    }

    public function findByCriteria(UserName $name, UserLastname $lastname, UserEmail $email): ?User
    {
        $user = $this->eloquentUserModel
            ->where('name', $name->value())
            ->where('lastname', $lastname->value())
            ->where('email', $email->value())
            ->firstOrFail();

        return new User(
            new UserName($user->name),
            new UserLastname($user->lastname),
            new UserEmail($user->email),
            new UserPassword($user->password),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserRememberToken($user->remember_token)
        );
    }

    public function save(User $user): void
    {
        $data = [
            'name' => $user->name()->value(),
            'lastname' => $user->lastname()->value(),
            'email' => $user->email()->value(),
            'password' => $user->password()->value(),
            'email_verified_at' => $user->emailVerifiedDate()->value(),
            'remember_token' => $user->rememberToken()->value(),
        ];

        $this->eloquentUserModel->create($data);
    }

    public function update(UserId $id, User $user): void
    {
        $data = [
            'name' => new UserName($user->name()->value()),
            'lastname' => new UserLastname($user->lastname()->value()),
            'email' => new UserEmail($user->email()->value())
        ];

        $this->eloquentUserModel
            ->findOrFail($id->value())
            ->update($data);
    }

    public function delete(UserId $id): void
    {
        $this->eloquentUserModel
            ->findOrFail($id->value())
            ->delete();
    }

}
