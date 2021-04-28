<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserRes;
use Illuminate\Http\Request;

class PantryController extends Controller
{

    /**
     * @return \App\Http\Resources\UserRes
     */
    public function index(): UserRes
    {
        return new UserRes(auth()->user());
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \App\Http\Resources\UserRes
     */
    public function store(Request $request): UserRes
    {
        $data = [];

        foreach ($request->ingredients as $ingredient) {
            $data[$ingredient['ingredient_id']] = ['quantity' => $ingredient['quantity']];
        }

        $request->user()->pantries()->sync($data);

        return new UserRes($request->user());

    }

}
