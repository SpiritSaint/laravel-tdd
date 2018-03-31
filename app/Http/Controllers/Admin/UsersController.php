<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Admin\Users\IndexRequest;
use App\Http\Requests\Admin\Users\ShowRequest;

class UsersController extends Controller
{
	protected $users;

	public function __construct(User $users)
	{
		$this->middleware(['auth', 'admin']);
		$this->users = $users;
	}

    public function index(IndexRequest $request)
    {
    	$users = $this->users->all();

    	return view('admin.users.index')->with('users', $users);
    }

    public function show(ShowRequest $request, User $user)
    {
    	return view('admin.users.show')->with('user', $user);
    }
}
