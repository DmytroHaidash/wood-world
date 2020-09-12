<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSavingRequest;
use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UsersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return View
	 */
	public function index(): View
	{
		return \view('admin.users.index', [
			'users' => User::latest('id')->paginate(20),
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\User\User $user
	 * @return View
	 */
	public function show(User $user): View
	{
		return \view('admin.users.show', compact('user'));
	}
	public function create():View
    {
        $roles = Role::get();
        return \view('admin.users.create', compact('roles'));
    }

    /**
     * @param UserSavingRequest $request
     * @return RedirectResponse
     */
    public function store(UserSavingRequest $request): RedirectResponse
    {
        $attrs = $request->only('name', 'email', 'role_id');
        $attrs['password'] = Hash::make($request->input('password'));

        User::create($attrs);

        return redirect()->route('admin.users.index');
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\User\User $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
	    $roles = Role::get();
        return view('admin.users.edit', compact('user', 'roles'));
	}

    /**
     * @param UserSavingRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserSavingRequest $request, User $user): RedirectResponse
    {
        $user->fill($request->only('name', 'email', 'role_id'));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     * @throws \Exception
     */
	public function destroy(User $user)
	{
        $user->delete();
        return redirect()->back();
	}
}
