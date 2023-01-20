<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\MainType\MainTypeRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainType\MainTypeCreateRequest;
use App\Http\Requests\Admin\MainType\MainTypeUpdateRequest;
use Illuminate\Http\Request;
use App\Models\MainType;

class MainTypeController extends Controller
{

    public function index(Request $request)
    {
        return MainTypeRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return MainTypeRepo::create();
    }

    public function store(MainTypeCreateRequest $request)
    {
        return MainTypeRepo::store($request);
    }

    public function edit(MainType $mainType)
    {
        return MainTypeRepo::edit($mainType);
    }

    public function update(MainTypeUpdateRequest $request, MainType $mainType)
    {
        return MainTypeRepo::update($request, $mainType);
    }

    public function destroy(MainType $mainType)
    {
        return MainTypeRepo::destroy($mainType);
    }

    public function destroyMany($ids)
    {
        return MainTypeRepo::destroyMany($ids);
    }
}
