<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\UserRes;
use Illuminate\Auth\AuthenticationException;

class LoginController extends Controller
{

    /**
     * @param \App\Http\Requests\LoginUserRequest $request
     *
     * @return \App\Http\Resources\UserRes
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function __invoke(LoginUserRequest $request): UserRes
    {
        if(!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        }

        return new UserRes($request->user());

    }

}
