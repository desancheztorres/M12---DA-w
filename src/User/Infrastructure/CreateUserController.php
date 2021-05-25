<?php

declare(strict_types=1);

namespace Src\User\Infrastructure;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Src\User\Application\create\UsersCreate;
use Src\User\Application\find\UsersByCriteria;
use Src\User\Domain\User;
use Src\User\Infrastructure\Repositories\EloquentUserRepository;

final class CreateUserController
{

    private $repository;

    /**
     * CreateUserController constructor.
     *
     * @param EloquentUserRepository $repository
     */
    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(StoreUserRequest $request): User
    {
        $userName              = $request->name;
        $userLastname          = $request->lastname;
        $userEmail             = $request->email;
        $userPassword          = Hash::make($request->password);
        $userEmailVerifiedDate = null;
        $userRememberToken     = null;

        $createUserCase = new UsersCreate($this->repository);
        $createUserCase->__invoke(
            $userName,
            $userLastname,
            $userEmail,
            $userPassword,
            $userEmailVerifiedDate,
            $userRememberToken
        );

        $getUserByCriteriaUseCase = new UsersByCriteria($this->repository);

        return $getUserByCriteriaUseCase->__invoke($userName, $userLastname, $userEmail);
    }

}
