<?php

declare(strict_types=1);

namespace Src\User\Domain\Contracts;

use Src\User\Domain\User;
use Src\User\Domain\ValueObjects\UserEmail;
use Src\User\Domain\ValueObjects\UserId;
use Src\User\Domain\ValueObjects\UserLastname;
use Src\User\Domain\ValueObjects\UserName;

interface UserRepository {
    public function find(UserId $id): ?User;
    public function findByCriteria(UserName $name, UserLastname $lastname, UserEmail $email): ?User;
    public function save(User $user): void;
    public function update(UserId $id, User $user): void;
    public function delete(UserId $id): void;
}
