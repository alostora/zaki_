<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\MeasureUnit\MeasureUnitRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MeasureUnit\MeasureUnitCreateRequest;
use App\Http\Requests\Admin\MeasureUnit\MeasureUnitUpdateRequest;
use App\Models\MeasureUnit;
use Illuminate\Http\Request;

class MeasureUnitController extends Controller
{
    
    public function index(Request $request)
    {
        return MeasureUnitRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return MeasureUnitRepo::create();
    }

    public function store(MeasureUnitCreateRequest $request)
    {
        return MeasureUnitRepo::store($request);
    }

    public function edit(MeasureUnit $measureUnit)
    {
        return MeasureUnitRepo::edit($measureUnit);
    }

    public function update(MeasureUnitUpdateRequest $request, MeasureUnit $measureUnit)
    {
        return MeasureUnitRepo::update($request,$measureUnit);
    }

    public function destroy(MeasureUnit $measureUnit)
    {
        return MeasureUnitRepo::destroy($measureUnit);
    }

    public function destroyMany($ids)
    {
        return MeasureUnitRepo::destroyMany($ids);
    }
}
