<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Brand\BrandRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\BrandCreateRequest;
use App\Http\Requests\Admin\Brand\BrandUpdateRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        return BrandRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return BrandRepo::create();
    }

    public function store(BrandCreateRequest $request)
    {
        return BrandRepo::store($request);
    }

    public function edit(Brand $brand)
    {
        return BrandRepo::edit($brand);
    }

    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        return BrandRepo::update($request, $brand);
    }

    public function destroy(Brand $brand)
    {
        return BrandRepo::destroy($brand);
    }

    public function destroyMany($ids)
    {
        return BrandRepo::destroyMany($ids);
    }        

}
