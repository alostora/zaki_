<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\Category\CategoryRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryCreateRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        return CategoryRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return CategoryRepo::create();
    }

    public function store(CategoryCreateRequest $request)
    {
        return CategoryRepo::store($request);
    }

    public function edit(Category $category)
    {
        return CategoryRepo::edit($category);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        return CategoryRepo::update($request, $category);
    }

    public function destroy(Category $category)
    {
        return CategoryRepo::destroy($category);
    }

    public function destroyMany($ids)
    {
        return CategoryRepo::destroyMany($ids);
    }
}
