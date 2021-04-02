<?php

namespace App\Http\Controllers\Users;

use App\Http\Resources\User;
use Illuminate\Http\Request;

class UpdateUserController {
    /**
     * @var \Src\BoundedContext\User\Infrastructure\UpdateUserController
     */
    private $updateUserController;

    /**
     * UpdateUserController constructor.
     * @param \Src\BoundedContext\User\Infrastructure\UpdateUserController $updateUserController
     */
    public function __construct(\Src\BoundedContext\User\Infrastructure\UpdateUserController $updateUserController)
    {
        $this->updateUserController = $updateUserController;
    }

    public function __invoke(Request $request)
    {
        $updatedUser = new User($this->updateUserController->__invoke($request));

        return response($updatedUser, 200);
    }
}
