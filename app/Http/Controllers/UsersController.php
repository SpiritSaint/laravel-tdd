<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Users\EditRequest;
use App\Http\Requests\Users\ShowRequest;
use App\Http\Requests\Users\UpdateRequest;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersController
 * @package App\Http\Controllers
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
        $this->users = $users;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the user.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->users->simplePaginate(5);

        return view('users.index')->with('users', $users);
    }

    /**
     * Display the specified user.
     *
     * @param ShowRequest $request
     * @param User $user
     * @return Response
     */
    public function show(ShowRequest $request, User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param EditRequest $request
     * @param User $user
     * @return Response
     */
    public function edit(EditRequest $request, User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param UpdateRequest $request
     * @param User $user
     * @return User
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return $user;
    }
}
