<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function show(User $user)
    {
    	return $user;
    }

    public function upgradeToAdmin(User $user)
    {
        $user->update([
            'is_admin' => TRUE,
        ]);

        return $user;
    }

    public function downgradeToUser(User $user)
    {
        $user->update([
            'is_admin' => FALSE,
        ]);

        return $user;
    }
}
