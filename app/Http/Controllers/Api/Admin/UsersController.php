<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Api\Admin\Users\ShowRequest;
use App\Http\Requests\Api\Admin\Users\UpgradeToAdminRequest;
use App\Http\Requests\Api\Admin\Users\DowngradeToUserRequest;

/**
 * Class UsersController
 * @package App\Http\Controllers\Api\Admin
 */
class UsersController extends Controller
{
    /**
     * @param ShowRequest $request
     * @param User $user
     * @return User
     */
    public function show(ShowRequest $request, User $user)
    {
    	return $user;
    }

    /**
     * @param UpgradeToAdminRequest $request
     * @param User $user
     * @return User
     */
    public function upgradeToAdmin(UpgradeToAdminRequest $request, User $user)
    {
        $user->update([
            'is_admin' => true,
        ]);

        return $user;
    }

    /**
     * @param DowngradeToUserRequest $request
     * @param User $user
     * @return User
     */
    public function downgradeToUser(DowngradeToUserRequest $request, User $user)
    {
        $user->update([
            'is_admin' => false,
        ]);

        return $user;
    }
}
