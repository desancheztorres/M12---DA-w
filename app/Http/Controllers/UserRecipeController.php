<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserRes;
use Illuminate\Http\Request;

class UserRecipeController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \App\Http\Resources\UserRes
     */
    public function __invoke(Request $request): UserRes
    {
        $request->user()->recipes()->sync($request->recipes);

        return new UserRes($request->user());
    }

}
