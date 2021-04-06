<?php

namespace App\Http\Controllers\Users;

class UserLogoutController {
    public function __invoke()
    {
        auth()->guard('web')->logout();
    }

}
