<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class UserController extends Controller {
    public function destroy() {
        request()->user()->delete();

        return response(null, 204);
    }
}
