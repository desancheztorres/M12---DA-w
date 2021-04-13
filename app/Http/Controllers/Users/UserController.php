<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function update(UpdateUserRequest $request)
    {
        $user = $request->user();

        $user->update([
            'name' => $request->get('name', $user->name),
            'lastname' => $request->get('lastname', $user->lastname),
            'email' => $request->get('email', $user->email),
            'password' => $request->password ? Hash::make($request->password) : $user->passord,
        ]);

        return $user;
    }

    public function destroy()
    {
        request()->user()->delete();

        return response(null, 204);
    }

}
