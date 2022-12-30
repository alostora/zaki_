<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Repo\Admin\Admin\AdminCreateRepo;
use App\Helpers\Repo\Admin\Admin\AdminSearchRepo;
use App\Helpers\Repo\Admin\Admin\AdminUpdateRepo;
use App\Http\Requests\Admin\Admin\AdminCreateRequest;
use App\Http\Requests\Admin\Admin\AdminUpdateRequest;
use App\Models\Admin;
use App\Models\Permission;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $adminSearchRepo = new AdminSearchRepo();

        $data = $adminSearchRepo->searchAllAdmins($request->get('query_string') ?? -1);

        return view('Admin/Admin/adminInfo', $data);
    }

    public function edit(Admin $admin)
    {

        $data['data'] = $admin;

        $data['permissions'] = Permission::get();

        return view('Admin/Admin/edit', $data);
    }

    public function update(AdminUpdateRequest $request, Admin $admin)
    {

        $adminUpdateRepo = new AdminUpdateRepo();

        $adminUpdateRepo->updateAdmin($request, $admin);

        session()->flash('success', 'Done');

        return back();
    }

    public function create(Admin $admin)
    {

        $data['data'] = $admin;

        $data['permissions'] = Permission::get();

        return view('Admin/Admin/create', $data);
    }

    public function store(AdminCreateRequest $request)
    {

        $adminCreateRepo = new AdminCreateRepo();

        $adminCreateRepo->createAdmin($request);

        session()->flash('success', 'Done');

        return back();
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        session()->flash('warning', 'Done');

        return back();
    }

    public function deleteManyAdmins($ids)
    {
        $ids = json_decode($ids);

        Admin::destroy($ids);

        session()->flash('warning', 'Done');

        return back();
    }
}
