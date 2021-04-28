<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateUserController extends Controller {
    private $createUserController;

    /**
     * CreateUserController constructor.
     * @param \Src\User\Infrastructure\CreateUserController $createUserController
     */
    public function __construct(\Src\User\Infrastructure\CreateUserController $createUserController)
    {
        $this->createUserController = $createUserController;
    }

    /**
     * @param Request $request
     *
     * @return \App\Http\Resources\User
     */
    public function __invoke(Request $request): UserResource
    {
        $user = new UserResource($this->createUserController->__invoke($request));

        return new UserResource($user);
    }
}
