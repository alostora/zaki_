<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\User\UserRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserCreateRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return UserRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return UserRepo::create();
    }

    public function store(UserCreateRequest $request)
    {
        return UserRepo::store($request);
    }

    public function edit(User $user)
    {   
        return UserRepo::edit($user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        return UserRepo::update($request,$user);
    }

    public function destroy(User $user)
    {
        return UserRepo::destroy($user);
    }

    public function destroyMany($ids)
    {
        return UserRepo::destroyMany($ids);
    }

}
