<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Permission\PermissionRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Requests\Admin\Permission\PermissionCreateRequest;
use App\Http\Requests\Admin\Permission\PermissionUpdateRequest;

class PermissionController extends Controller
{

    public function index(Request $request)
    {
        return PermissionRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return PermissionRepo::create();
    }

    public function store(PermissionCreateRequest $request)
    {
        return PermissionRepo::store($request);
    }

    public function edit(Permission $permission)
    {
        return PermissionRepo::edit($permission);
    }

    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        return PermissionRepo::update($request,$permission);
    }

    public function destroy(Permission $permission)
    {
        return PermissionRepo::destroy($permission);
    }

    public function destroyMany($ids)
    {
        return PermissionRepo::destroyMany($ids);
    }
}
