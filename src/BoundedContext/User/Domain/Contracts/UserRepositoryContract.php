<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Domain\Contracts;

use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Src\BoundedContext\User\Domain\ValueObjects\UserLastname;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;

interface UserRepositoryContract {
    public function find(UserId $id): ?User;
    public function findByCriteria(UserName $name, UserLastname $lastname, UserEmail $email): ?User;
    public function save(User $user): void;
    public function update(UserId $id, User $user): void;
    public function delete(UserId $id): void;
}
