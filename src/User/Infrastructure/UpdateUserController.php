<?php

declare(strict_types=1);

namespace Src\User\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\User\Application\find\Users;
use Src\User\Application\update\UsersUpdate;
use Src\User\Domain\User;
use Src\User\Infrastructure\Repositories\EloquentUserRepository;

final class UpdateUserController {
    /**
     * @var EloquentUserRepository
     */
    private $repository;

    /**
     * UpdateUserController constructor.
     * @param EloquentUserRepository $repository
     */
    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return User
     */
    public function __invoke(Request $request): User
    {
        $userId = (int) $request->id;

        $getUserUseCase = new Users($this->repository);
        $user = $getUserUseCase->__invoke($userId);

        $userName = $request->get('name', $user->name()->value());
        $userLastname = $request->get('lastname', $user->lastname()->value());
        $userEmail = $request->get('email', $user->email()->value());
        $userPassword = Hash::make($request->password);
        $userEmailVerifiedDate = $user->emailVerifiedDate()->value();
        $userRememberToken = $user->rememberToken()->value();

        $updateUserUseCase = new UsersUpdate($this->repository);
        $updateUserUseCase->__invoke(
            $userId,
            $userName,
            $userLastname,
            $userEmail,
            $userPassword,
            $userEmailVerifiedDate,
            $userRememberToken
        );

        return $getUserUseCase->__invoke($userId);
    }
}
