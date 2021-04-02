<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Domain;

use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserLastname;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Src\BoundedContext\User\Domain\ValueObjects\UserRememberToken;

final class User {
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $emailVierifiedDate;
    private $rememberToken;

    public function __construct(
        UserName $name,
        UserLastname $lastname,
        UserEmail $email,
        UserPassword $password,
        UserEmailVerifiedDate $emailVierifiedDate,
        UserRememberToken $rememberToken
    )
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->emailVierifiedDate = $emailVierifiedDate;
        $this->rememberToken = $rememberToken;
    }

    public function name(): UserName {
        return $this->name;
    }

    public function lastname(): UserLastname {
        return $this->lastname;
    }

    public function email(): UserEmail {
        return $this->email;
    }

    public function password(): UserPassword {
        return $this->password;
    }

    public function emailVerifiedDate(): UserEmailVerifiedDate {
        return $this->emailVierifiedDate;
    }

    public function rememberToken(): UserRememberToken {
        return $this->rememberToken;
    }

    public static function create(
        UserName $name,
        UserLastname $lastname,
        UserEmail $email,
        UserPassword $password,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserRememberToken $rememberToken
    ): User {
        return new self($name, $lastname, $email, $password, $emailVerifiedDate, $rememberToken);
    }


}
