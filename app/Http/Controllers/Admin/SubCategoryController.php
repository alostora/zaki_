<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\SubCategory\SubCategoryRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategory\SubCategoryCreateRequest;
use App\Http\Requests\Admin\SubCategory\SubCategoryUpdateRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index(Request $request)
    {
        return SubCategoryRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return SubCategoryRepo::create();
    }

    public function store(SubCategoryCreateRequest $request)
    {
        return SubCategoryRepo::store($request);
    }

    public function edit(SubCategory $subCategory)
    {
        return SubCategoryRepo::edit($subCategory);
    }

    public function update(SubCategoryUpdateRequest $request, SubCategory $subCategory)
    {
        return SubCategoryRepo::update($request, $subCategory);
    }

    public function destroy(SubCategory $subCategory)
    {
        return SubCategoryRepo::destroy($subCategory);
    }

    public function destroyMany($ids)
    {
        return SubCategoryRepo::destroyMany($ids);
    }
}
