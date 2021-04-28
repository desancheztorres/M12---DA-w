<?php

namespace App\Http\Controllers\Users;

use App\Http\Resources\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;

class UpdateUserController {

    /**
     * @var \Src\User\Infrastructure\UpdateUserController
     */
    private $updateUserController;

    /**
     * UpdateUserController constructor.
     *
     * @param \Src\User\Infrastructure\UpdateUserController $updateUserController
     */
    public function __construct(\Src\User\Infrastructure\UpdateUserController $updateUserController)
    {
        $this->updateUserController = $updateUserController;
    }

    /**
     * @param Request $request
     *
     * @return \App\Http\Resources\User
     */
    public function __invoke(Request $request): UserResource
    {
        $updatedUser = new UserResource($this->updateUserController->__invoke($request));

        return new UserResource($updatedUser);
    }

}
