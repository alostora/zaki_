<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Role\RoleRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\RoleCreateRequest;
use App\Http\Requests\Admin\Role\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index(Request $request)
    {
        return RoleRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return RoleRepo::create();
    }

    public function store(RoleCreateRequest $request)
    {
        return RoleRepo::store($request);
    }

    public function edit(Role $role)
    {
        return RoleRepo::edit($role);
    }

    public function update(RoleUpdateRequest $request, Role $role)
    {
        return RoleRepo::update($request,$role);
    }

    public function destroy(Role $role)
    {
        return RoleRepo::destroy($role);
    }

    public function destroyMany($ids)
    {
        return RoleRepo::destroyMany($ids);
    }


}
