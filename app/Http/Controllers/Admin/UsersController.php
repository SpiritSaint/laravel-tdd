<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Admin\Users\IndexRequest;
use App\Http\Requests\Admin\Users\ShowRequest;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    /**
     * @var User
     */
    protected $users;

    /**
     * UsersController constructor.
     * @param User $users
     */
    public function __construct(User $users)
	{
		$this->middleware(['auth', 'admin']);
		$this->users = $users;
	}

    /**
     * @param IndexRequest $request
     * @return $this
     */
    public function index(IndexRequest $request)
    {
    	$users = $this->users->all();

    	return view('admin.users.index')->with('users', $users);
    }

    /**
     * @param ShowRequest $request
     * @param User $user
     * @return $this
     */
    public function show(ShowRequest $request, User $user)
    {
    	return view('admin.users.show')->with('user', $user);
    }
}
