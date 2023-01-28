<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Setting\SettingRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingCreateRequest;
use App\Http\Requests\Admin\Setting\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        return SettingRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return SettingRepo::create();
    }

    public function store(SettingCreateRequest $request)
    {
        return SettingRepo::store($request);
    }

    public function edit(Setting $setting)
    {
        return SettingRepo::edit($setting);
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        return SettingRepo::update($request, $setting);
    }

    public function destroy(Setting $setting)
    {
        return SettingRepo::destroy($setting);
    }

    public function destroyMany($ids)
    {
        return SettingRepo::destroyMany($ids);
    }
}
