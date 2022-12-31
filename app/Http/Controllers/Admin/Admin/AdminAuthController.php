<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\LoginRequest;
use App\Models\Admin;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('Admin/layouts/login');
    }

    public function doLogin(LoginRequest $request)
    {
        if (auth()->guard('admin')->attempt($request->validated())) {

            return redirect('admin');
        } else {

            return redirect('admin/login');
        }
    }

    public function dashboard()
    {
        $data['admins'] = Admin::count();
        $data['users'] = User::count();
        return view('Admin/layouts/dashboard', $data);
    }

    public function logOut()
    {
        auth()->guard('admin')->logout();

        return redirect('admin/login');
    }
}
