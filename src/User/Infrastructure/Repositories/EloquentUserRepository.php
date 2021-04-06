<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Repositories;

use App\Models\User as EloquentUserModel;
use Src\User\Domain\User;
use Src\User\Domain\Contracts\UserRepository;
use Src\User\Domain\ValueObjects\UserEmail;
use Src\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\User\Domain\ValueObjects\UserId;
use Src\User\Domain\ValueObjects\UserLastname;
use Src\User\Domain\ValueObjects\UserName;
use Src\User\Domain\ValueObjects\UserPassword;
use Src\User\Domain\ValueObjects\UserRememberToken;

final class EloquentUserRepository implements UserRepository {

    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }

    public function find(UserId $id): ?User
    {
        $user = $this->eloquentUserModel->findOrFail($id->value());

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
            'name'  => $user->name()->value(),
            'lastname' => $user->lastname()->value(),
            'email' => $user->email()->value(),
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
