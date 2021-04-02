<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\BoundedContext\User\Application\GetUserUseCase;
use Src\BoundedContext\User\Application\UpdateUserUseCase;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

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

        $getUserUseCase = new GetUserUseCase($this->repository);
        $user = $getUserUseCase->__invoke($userId);

        $userName = $request->get('name', $user->name()->value());
        $userLastname = $request->get('lastname', $user->lastname()->value());
        $userEmail = $request->get('email', $user->email()->value());
        $userPassword = Hash::make($request->password);
        $userEmailVerifiedDate = $user->emailVerifiedDate()->value();
        $userRememberToken = $user->rememberToken()->value();

        $updateUserUseCase = new UpdateUserUseCase($this->repository);
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
