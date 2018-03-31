<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
	protected $users;

	public function __construct(User $users)
	{
		$this->middleware(['auth', 'admin']);
		$this->users = $users;
	}

    public function index()
    {
    	$users = $this->users->all();

    	return view('admin.users.index')->with('users', $users);
    }

    public function show(User $user)
    {
    	return view('admin.users.show')->with('user', $user);
    }
}
