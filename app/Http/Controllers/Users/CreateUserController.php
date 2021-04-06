<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\User;
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
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $user = new User($this->createUserController->__invoke($request));

        return response($user, 201);
    }
}
