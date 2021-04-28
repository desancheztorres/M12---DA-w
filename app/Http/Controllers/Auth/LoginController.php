<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserRes;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \App\Http\Resources\UserRes
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function __invoke(Request $request): UserRes
    {
        if(!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        }

        return new UserRes($request->user());

    }

}
