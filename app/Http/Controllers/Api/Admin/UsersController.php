<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Api\Admin\Users\ShowRequest;
use App\Http\Requests\Api\Admin\Users\UpgradeToAdminRequest;
use App\Http\Requests\Api\Admin\Users\DowngradeToUserRequest;

class UsersController extends Controller
{
    public function show(ShowRequest $request, User $user)
    {
    	return $user;
    }

    public function upgradeToAdmin(UpgradeToAdminRequest $request, User $user)
    {
        $user->update([
            'is_admin' => true,
        ]);

        return $user;
    }

    public function downgradeToUser(DowngradeToUserRequest $request, User $user)
    {
        $user->update([
            'is_admin' => false,
        ]);

        return $user;
    }
}
