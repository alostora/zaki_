<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Repo\Admin\Admin\AdminRepo;
use App\Http\Requests\Admin\Admin\AdminCreateRequest;
use App\Http\Requests\Admin\Admin\AdminUpdateRequest;
use App\Models\Admin;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        return AdminRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return AdminRepo::create();
    }

    public function store(AdminCreateRequest $request)
    {
        return AdminRepo::store($request);
    }

    public function edit(Admin $admin)
    {
        return AdminRepo::edit($admin);
    }

    public function update(AdminUpdateRequest $request, Admin $admin)
    {
        return AdminRepo::update($request,$admin);
    }

    public function destroy(Admin $admin)
    {
        return AdminRepo::destroy($admin);
    }

    public function destroyMany($ids)
    {
        return AdminRepo::destroyMany($ids);
    }
}
