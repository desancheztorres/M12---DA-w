<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\BoundedContext\User\Application\CreateUserUseCase;
use Src\BoundedContext\User\Application\GetUserByCriteriaUseCase;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

final class CreateUserController {
    private $repository;

    /**
     * CreateUserController constructor.
     * @param EloquentUserRepository $repository
     */
    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): User
    {
        $userName = $request->name;
        $userLastname = $request->lastname;
        $userEmail = $request->email;
        $userPassword = Hash::make($request->password);
        $userEmailVerifiedDate = null;
        $userRememberToken = null;

        $createUserCase = new CreateUserUseCase($this->repository);
        $createUserCase->__invoke(
            $userName,
            $userLastname,
            $userEmail,
            $userPassword,
            $userEmailVerifiedDate,
            $userRememberToken
        );

        $getUserByCriteriaUseCase = new GetUserByCriteriaUseCase($this->repository);
        return $getUserByCriteriaUseCase->__invoke($userName, $userLastname, $userEmail);
    }
}
